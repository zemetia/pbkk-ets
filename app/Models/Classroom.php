<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama",
        "teacher_id"
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, "teacher_id", "id");
    }

    public function student(): HasMany
    {
        return $this->hasMany(User::class, "classroom_id", "id");
    }
}
