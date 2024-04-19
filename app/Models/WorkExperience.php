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
        'start_date_worked',
        'end_date_worked',
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
