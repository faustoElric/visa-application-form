<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * Get the answer that has the Question.
     */
    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}
