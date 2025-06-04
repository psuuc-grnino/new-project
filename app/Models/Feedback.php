<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feedback extends Model
{
    protected $fillable = ['student_id', 'lecturer_id', 'message'];

    public function student(): BelongsTo {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function lecturer(): BelongsTo {
        return $this->belongsTo(User::class, 'lecturer_id');
    }
}