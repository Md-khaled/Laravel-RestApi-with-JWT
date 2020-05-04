<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassName extends Model
{
    protected $guarded=[];
     public function subjects()
    {
    	return $this->hasMany(Subject::class);
    }
     public function sections()
    {
    	return $this->hasMany(Section::class);
    }
}
