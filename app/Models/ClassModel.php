<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'nama_kelas',
        'id_pengajar',
        'hp',   
        'tipe',
        'paket',
        'status',
        'alasan_libur',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'id_pengajar');
    }
}