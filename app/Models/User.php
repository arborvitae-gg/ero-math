<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'middle_name', // optional
        'last_name',
        'email',
        'password',
        'grade_level', // optional for users
        'school', // optional for users, admins
        'coach_name', // optional for users, admins
        'role',  // optional for admin
        'quiz_enabled',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'grade_level' => 'integer',
            'quiz_enabled' => 'boolean',
        ];
    }

    protected $attributes = [
        'quiz_enabled' => false, // Default for users
    ];

    // Relationship with quiz attempts
    public function quizAttempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }

    // Relationship with created questions (for admins)
    public function createdQuestions()
    {
        return $this->hasMany(Question::class, 'created_by');
    }

    // Computed full name (e.g., "John Doe" or "Jane A. Smith")
    public function getFullNameAttribute()
    {
        $middleInitial = $this->middle_name ? " {$this->middle_name} " : ' ';
        return "{$this->first_name}{$middleInitial}{$this->last_name}";
    }
}
