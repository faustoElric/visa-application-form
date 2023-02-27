<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'school_name',
        'year',
        'area',
        'status',
        'education_level_id',
    ];
}
