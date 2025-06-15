<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'kelas';
    protected $primaryKey = 'kode_kelas';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ([
        'kode_kelas',
        'nama_kelas',
        'wali_kelas',
    ]);

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_kelas', 'kode_kelas');
    }
}
