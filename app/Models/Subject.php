<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded=[];
    
    public function clsname()
    {
        return $this->belongsTo(ClassName::class,'class_name_id');
    }
}
