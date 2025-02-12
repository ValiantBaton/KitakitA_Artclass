<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $table = 'salaries';

    protected $fillable = [
        'id_pengajar',
        'jumlah',
        'status',
        'tanggal_gaji',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'id_pengajar');
    }
}