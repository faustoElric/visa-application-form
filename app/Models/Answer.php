<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'question_id',
        'answer',
    ];

    /**
     * Get the profile that has the Answers.
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * Get the question that has the Answers.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
