<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'siswa';
    protected $primaryKey = 'nisn';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];
    protected $fillable = [
        'nisn',
        'id_kelas'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nisn', 'username');
    }
    public function pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class, 'kode_siswa', 'nisn');
    }
    public function bimbingan()
    {
        return $this->hasMany(Bimbingan::class, 'kode_siswa', 'nisn');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'kode_kelas');
    }
}
