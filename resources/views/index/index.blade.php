@extends('layouts.app')
@section('content')

    <h2 class="text-center">World database test</h2>

    <div class="margin-y">
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-primary active">
                <input type="radio" name="options" id="js_sort" value="js" autocomplete="off" checked> Sort by JS
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="options" id="php_sort" value="php" autocomplete="off"> Sort by PHP
            </label>
        </div>
    </div>

    <div class="bb-regions" id="regions">
        <table class="table table-bordered table-striped tsort">
            <thead>
                <tr>
                    <th class="{{$sort=='Continent' ? 'sel '.$route : ''}}">
                        <a href="{{action('IndexController@index', ['sort' => $sort=='Continent' && $route == 'asc' ? 'Continent.desc' : 'Continent.asc'])}}" >Continent</a>
                    </th>
                    <th class="{{$sort=='Region' ? 'sel '.$route : ''}}">
                        <a href="{{action('IndexController@index', ['sort' => $sort=='Region' && $route == 'asc' ? 'Region.desc' : 'Region.asc'])}}" >Region</a>
                    </th>
                    <th class="{{$sort=='countries' ? 'sel '.$route : ''}}">
                        <a href="{{action('IndexController@index', ['sort' => $sort=='countries' && $route == 'asc' ? 'countries.desc' : 'countries.asc'])}}" >countries</a>
                    </th>
                    <th class="{{$sort=='LifeDuration' ? 'sel '.$route : ''}}">
                        <a href="{{action('IndexController@index', ['sort' => $sort=='LifeDuration' && $route == 'asc' ? 'LifeDuration.desc' : 'LifeDuration.asc'])}}" >LifeDuration</a>
                    </th>
                    <th class="{{$sort=='Population' ? 'sel '.$route : ''}}">
                        <a href="{{action('IndexController@index', ['sort' => $sort=='Population' && $route == 'asc' ? 'Population.desc' : 'Population.asc'])}}" >Population</a>
                    </th>
                    <th class="{{$sort=='Cities' ? 'sel '.$route : ''}}">
                        <a href="{{action('IndexController@index', ['sort' => $sort=='Cities' && $route == 'asc' ? 'Cities.desc' : 'Cities.asc'])}}" >Cities</a>
                    </th>
                    <th class="{{$sort=='Languages' ? 'sel '.$route : ''}}">
                        <a href="{{action('IndexController@index', ['sort' => $sort=='Languages' && $route == 'asc' ? 'Languages.desc' : 'Languages.asc'])}}" >Languages</a>
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($regions as $region)
            <tr>
                <td>{{$region->Continent}}</td>
                <td>{{$region->Region}}</td>
                <td>{{$region->countries}}</td>
                <td>{{$region->Population > 0 ? number_format($region->LifeDuration,2,'.',' ') : ''}}</td>
                <td>{{$region->Population > 0 ? $region->Population : ''}}</td>
                <td>{{$region->Cities}}</td>
                <td>{{$region->Languages}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection