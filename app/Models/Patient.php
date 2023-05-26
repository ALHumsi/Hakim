<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'first_name',
        'last_name',
        'father_name',
        'email',
        'gender',
        'date_of_birth',
        'phone',
        'address',
    ];
}
