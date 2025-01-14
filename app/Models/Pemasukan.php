<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    
    protected $lable = "pemasukans";
    protected $fillable = ["sumber_dana", "jumlah", "keterangan"];
}
