<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'position',
        'time_worked',
        'date_worked',
        'company',
        'activity',
        'tool_used',
    ];

    /**
     * Get the profile that has the Works Experiences.
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
