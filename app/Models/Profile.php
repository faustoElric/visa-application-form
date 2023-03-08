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
        'civil_status_id',
        'phone_number',
        'email',
        'academic_level_id',
        'desired_job',
        'city',
        'state',
        'english_listening_level_id',
        'english_speaking_level_id',
        'children_live_with_me',
        'children_dont_live_with_me',
    ];

    /**
     * Get the user that owns the profile.
     */
    public function civilStatus()
    {
        return $this->belongsTo(CivilStatus::class);
    }
}
