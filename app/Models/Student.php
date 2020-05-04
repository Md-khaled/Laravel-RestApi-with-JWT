<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded=[];
     public function clsname()
    {
        return $this->belongsTo(ClassName::class,'class_name_id');
    }
     public function section()
    {
        return $this->belongsTo(Section::class,'class_name_id');
    }
}
