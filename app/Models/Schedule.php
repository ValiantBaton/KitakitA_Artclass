<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';

    protected $fillable = [
        'id_kelas',
        'tanggal',
        'lokasi',
    ];

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'id_kelas');
    }
}