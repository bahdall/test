<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryLanguage extends Model
{
    protected $table = 'CountryLanguage';
    public $timestamps = false;
    protected $primaryKey = array('CountryCode','Language');
    public $incrementing = false;
}
