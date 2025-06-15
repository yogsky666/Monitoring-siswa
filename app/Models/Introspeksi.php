<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Introspeksi extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'introspeksi';
    // protected $guarded = ['id'];
    protected $fillable = ['desk_introspeksi', 'point_introspeksi'];

    public function bimbingan()
    {
        return $this->hasMany(Bimbingan::class, 'id_perbaikan', 'id');
    }
}
