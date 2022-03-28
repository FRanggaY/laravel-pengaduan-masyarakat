<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masyarakat extends Model
{
    use HasFactory;
    public $primaryKey = 'nik';

    protected $fillable = [
        'nik',
        'nama',
        'username',
        'password',
        'telp',
    ];

    public $timestamps = false;

    public function pengaduan()
    {
        return $this->hasOne(pengaduan::class, 'nik', 'nik');
    }
    public $incrementing = false;
}
