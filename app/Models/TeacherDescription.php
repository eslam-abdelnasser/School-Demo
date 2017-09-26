<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherDescription extends Model
{
    //
    protected $table = 'teacher_description';



    public function language(){

        return $this->belongsTo('App\Models\Language','lang_id');
    }
}
