<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Patient extends Model
{
    use HasFactory, HasApiTokens, SoftDeletes;

    protected $guarded = [];

    protected $hidden = [
        'password',
    ];
}
