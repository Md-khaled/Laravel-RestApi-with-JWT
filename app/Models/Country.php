<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table='_z_country';
    public $timestamps=false;
    //protected $guarded =[];
    protected $fillable = [
    'iso',
    'name'
    'dname',
    'iso3',
    'position',
    'numcode',
    'phonecode',
    'created',
    'register_by',
    'modified',
    'modified_by',
    'record_deleted' 
    ];
}
