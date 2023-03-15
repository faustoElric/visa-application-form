<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnglishLevel extends Model
{
    use HasFactory;

    /**
     * Get the profile that has the English Level.
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
