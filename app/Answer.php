<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    public function exam()
    {
        return $this->hasOne('App\Exam');
    }
}
