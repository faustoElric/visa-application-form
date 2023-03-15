<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicLevel extends Model
{
    use HasFactory;

    /**
     * Get the profile that has the Academic Level.
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * Get the Education that has the Academic Level.
     */
    public function educations()
    {
        return $this->hasMany(Education::class);
    }
}
