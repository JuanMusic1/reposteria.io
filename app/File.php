<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function excercise(){
        return $this->belongsTo(Excercise::class);
    }
}
