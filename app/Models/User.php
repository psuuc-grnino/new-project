<?php

namespace App\Models;
use App\Models\Accesstype;
use App\Models\Course;
use App\Models\Feedback;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['first_name', 'last_name', 'username', 'password', 'accesstype_id', 'course_id'];

    public function accesstype(): BelongsTo {
        return $this->belongsTo(Accesstype::class);
    }

    public function course(): BelongsTo {
        return $this->belongsTo(Course::class);
    }

    public function feedbackGiven(): HasMany {
        return $this->hasMany(Feedback::class, 'student_id');
    }

    public function feedbackReceived(): HasMany {
        return $this->hasMany(Feedback::class, 'lecturer_id');
    }
}
