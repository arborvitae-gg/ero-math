<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Choice extends Model
{
    protected $fillable = [
        'question_id',
        'identifier', // A, B, C, D
        'content', // Stores text or image URL
        'content_type', // text or image
    ];

    // Relationship with question
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
