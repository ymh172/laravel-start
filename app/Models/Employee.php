<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function post(){
        return $this->hasOne(Post::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
