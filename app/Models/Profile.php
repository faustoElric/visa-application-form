<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the profile.
     */
    public function civilStatus()
    {
        return $this->belongsTo(CivilStatus::class);
    }
}
