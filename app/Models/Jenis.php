<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jenis extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama",
    ];

    public function barang(): HasMany
    {
        return $this->hasMany(Barang::class, "jenis_id", "id");
    }
}
