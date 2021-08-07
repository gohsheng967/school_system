<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    use HasFactory;


    public function students(){
        return $this->belongsToMany('App\Models\Students')->withPivot('year','remark','id');
    }
}
