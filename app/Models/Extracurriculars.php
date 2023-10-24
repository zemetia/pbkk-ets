<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Extracurriculars extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama",
    ];

    public function student_extracurricular(): BelongsToMany
    {
        return $this->belongsToMany(User::class, "student_extracurriculars", "extracurricular_id", "user_id");
    }
}
