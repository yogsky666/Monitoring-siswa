<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bimbingan extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'bimbingan';
    // protected $guarded = ['id'];
    protected $fillable = ['kode_siswa', 'id_perbaikan'];
    protected $dates = ['create_at'];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'kode_siswa', 'nisn');
    }
    public function introspeksi()
    {
        return $this->belongsTo(Introspeksi::class, 'id_perbaikan', 'id');
    }
}
