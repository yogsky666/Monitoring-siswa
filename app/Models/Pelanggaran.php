<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pelanggaran extends Model
{
    use HasFactory;

    public $timestamps = true;
    public $table = 'pelanggaran';
    // public $guarded = ['id'];
    public $fillable = ['kode_siswa', 'id_sanksi'];
    protected $dates = ['create_at'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'kode_siswa', 'nisn');
    }
    public function sanksi()
    {
        return $this->belongsTo(Sanksi::class, 'id_sanksi', 'id');
    }
}
