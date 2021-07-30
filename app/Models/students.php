<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    use HasFactory;

    public function primary_Prize(){
        return $this->hasMany('App\Models\students_primaryprize');
    }
    public function classes(){
        return $this->belongsToMany('App\Models\Classes');
    }
    public function Juec(){
        return $this->hasMany('App\Models\Juec');
    }
    public function Suec(){
        return $this->hasMany('App\Models\Suec');
    }
    public function Prize(){
        return $this->belongsToMany('App\Models\Prize');
    }



}
