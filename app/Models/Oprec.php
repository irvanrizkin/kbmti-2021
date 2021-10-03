<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Oprec extends Model
{ 
    use HasFactory;

    public $table = 'oprecs';
 
    protected $fillable = [
        'name',
        'nim',
        'angkatan', 
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'email',
        'id_line',
        'no_hp',
    ];
}
