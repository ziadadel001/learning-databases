<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class post extends Model
{
    protected $fillable = ['title', 'body'];
}
