<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'Country';
    public $timestamps = false;
    protected $primaryKey = 'Code';
    public $incrementing = false;
}
