<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'date_of_birth',
        'age',
        'phone_number',
        'secondary_phone_number',
        'email',
        'academic_level_id',
        'state_id',
        'township_id',
        'english_level_id',
        'children_live_with_me',
        'children_dont_live_with_me',
        'dui',
        'visa_type',
        'has_passport',
        'gender',
        'employment_status',
    ];

    /**
     * Get the user that owns the profile.
     */
    public function civilStatus()
    {
        return $this->belongsTo(CivilStatus::class);
    }

    /**
     * Get the academic level that has the profile.
     */
    public function academicLevel()
    {
        return $this->belongsTo(AcademicLevel::class);
    }

    /**
     * Get the english level that has the profile.
     */
    public function englishLevel()
    {
        return $this->belongsTo(EnglishLevel::class);
    }

    /**
     * Get the educations that has the profile.
     */
    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    /**
     * Get the work experience that has the profile.
     */
    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class);
    }

    /**
     * Get the answers that has the profile.
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * Get the state of the profile.
     */
    public function state()
    {
        return $this->hasOne(Answer::class);
    }

    /**
     * Get the township of the profile.
     */
    public function township()
    {
        return $this->hasOne(Answer::class);
    }
}
