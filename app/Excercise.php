<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excercise extends Model
{
    public function tag(){
        return $this->hasMany(Tag::class);
    }

    public function file(){
        return $this->hasMany(File::class);
    }

    public function user_excercise(){
        return $this->hasMany(User_Excercise::class);
    }
}
