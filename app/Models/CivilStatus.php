<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CivilStatus extends Model
{
    use HasFactory;

    /**
     * Get the profile associated with the civil status.
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
