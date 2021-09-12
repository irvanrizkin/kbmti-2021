<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankSoalMateri extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TYPE_SELECT = [
        'Soal' => "Soal",
        "Materi" => "Materi"
    ];

    public const SUB_TYPE_SELECT = [
        'DOCS' => 'docs',
        'PPT'  => 'ppt',
        'PDF'  => 'pdf',
        'XLSX' => 'xlsx',
    ];

    public $table = 'bank_soal_materis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'link',
        'matkuliah_id',
        'type',
        'sub_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function matkuliah()
    {
        return $this->belongsTo(Matkuliah::class, 'matkuliah_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
