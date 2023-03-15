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

    /**
     * Get the profile that has the Educations.
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * Get the Academic Level that has the Education.
     */
    public function academicLevel()
    {
        return $this->belongsTo(AcademicLevel::class, 'education_level_id');
    }
}
