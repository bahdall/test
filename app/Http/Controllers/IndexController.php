<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $regions = Country::on()->select([
            'Continent',
            'Region',
            DB::raw('COUNT(Code) countries'), //выводим количество стран в регионе
            DB::raw('AVG(LifeExpectancy) LifeDuration'), //выводим среднюю продолжительность жизни в регионе
            DB::raw('SUM(Population) Population'), //выводим популяцию в регионе
            DB::raw('SUM(c2.city_count) Cities'), //находим количество городов в регионе путем суммирования кол-ва городов по каждой стране
            DB::raw('SUM(l.lang_count) Languages'), //находим количество языков в регионе путем суммирования кол-ва языков по каждой стране
        ])->leftJoin(DB::raw('(
            SELECT COUNT(City.ID) city_count, City.CountryCode FROM City
            GROUP BY City.CountryCode
        ) c2'),'c2.CountryCode','=','Country.Code') //соединяем выборку с количеством городов в каждой стране
        ->leftJoin(DB::raw('(
            SELECT COUNT(CountryLanguage.`Language`) lang_count, CountryLanguage.CountryCode FROM CountryLanguage
            GROUP BY CountryLanguage.CountryCode
        ) l'),'l.CountryCode','=','Country.Code') //соединяем выборку с количеством языков в каждой стране
        ->groupBy('Region', 'Continent'); //группируем по региону и континенту

        // Сортировка по атрибутам
        $sort = false;
        $route = false;
        if ($request->has('sort')) {
            list($sort,$route) = explode('.',$request->sort); //Разделяем строку на атрибут сортировки и направление сортировки

            if($route == 'desc' || $route == 'asc') {
                switch ($sort) {
                    case 'Continent':
                        $regions = $regions->orderBy('Continent', $route);
                        break;
                    case 'Region':
                        $regions = $regions->orderBy('Region', $route);
                        break;
                    case 'countries':
                        $regions = $regions->orderBy('countries', $route);
                        break;
                    case 'LifeDuration':
                        $regions = $regions->orderBy('LifeDuration', $route);
                        break;
                    case 'Population':
                        $regions = $regions->orderBy('Population', $route);
                        break;
                    case 'Cities':
                        $regions = $regions->orderBy('Cities', $route);
                        break;
                    case 'Languages':
                        $regions = $regions->orderBy('Languages', $route);
                        break;
                }
            }
        }

        $regions = $regions->get();

        return view('index.index',[
            'regions' => $regions,
            'sort' => $sort,
            'route' => $route,
        ]);
    }
}