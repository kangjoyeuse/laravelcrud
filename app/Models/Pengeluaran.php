<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $fillable = ['tanggal', 'keterangan', 'jumlah'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    use HasFactory;
}
