<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    use HasFactory;

    /**
     * Get the sstate that owns the township.
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
