<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama",
        "image"
    ];

    public function classroom(): HasMany
    {
        return $this->hasMany(Classroom::class, "teacher_id", "id");
    }
}
