<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function employees(){
        return $this->hasMany(Employee::class);
    }

    public function posts(){
        return $this->hasManyThrough(Post::class, Employee::class);
    }

}
