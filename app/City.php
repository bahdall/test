<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'City';
    public $timestamps = false;
    protected $primaryKey = 'ID';
}
