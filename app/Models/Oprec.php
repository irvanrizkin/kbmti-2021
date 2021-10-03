<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Oprec extends Model
{
    // Temporary Models for Oprec at 4 Octiber 2021
    use HasFactory;
    use SoftDeletes;

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
        'berkas_link',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
