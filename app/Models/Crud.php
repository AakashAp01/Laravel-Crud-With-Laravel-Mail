<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Crud extends User
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'image',
    ];
}
