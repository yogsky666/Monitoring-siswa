<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sanksi extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'sanksi';
    // protected $guarded = ['id'];
    protected $fillable = ['desc_kesalahan', 'point_pelanggar'];

    public function pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class, 'id_sanksi', 'id');
    }
}
