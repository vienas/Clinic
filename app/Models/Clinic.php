<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Clinic extends Model
{
    use HasFactory;
    protected $table = 'clinic';

        public function post() 
        {
            return $this->hasMany(Post::class);
        }

        public function doctor()
        {
            return $this->belongsTo(User::class);
        }
}