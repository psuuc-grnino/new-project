<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Accesstype extends Model
{
    protected $fillable = ['username'];

    public function users(): HasMany {
        return $this->hasMany(User::class);
        
    }
}
