<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Excercise extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function excercise(){
        return $this->belongsTo(Excercise::class);
    }
}
