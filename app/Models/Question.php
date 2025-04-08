<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    protected $fillable = [
        'category',
        'content', // Stores text or image URL
        'content_type', // text or image
        'correct_answer', // A, B, C, D
        'created_by', // admin's user_id
    ];

    // Relationship with choices
    public function choices(): HasMany
    {
        return $this->hasMany(Choice::class);
    }

    // Relationship with Admin
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
