<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'id_kelas',
        'jumlah',
        'status',
        'tanggal_tagih',
    ];

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'id_kelas');
    }
}