<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama",
        "jenis_id",
        "kondisi_id",
        "keterangan",
        "kecacatan",
        "jumlah",
        "path_gambar",
    ];

    public function jenis(): BelongsTo
    {
        return $this->belongsTo(Jenis::class, "jenis_id", "id");
    }
    public function kondisi(): BelongsTo
    {
        return $this->belongsTo(Kondisi::class, "kondisi_id", "id");
    }
}
