<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    use HasFactory;
    protected $table = 'course_user';


    public function User(){
        return $this -> belongsTo('App\Models\User');
    }
}
