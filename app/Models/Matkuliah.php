<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matkuliah extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'matkuliahs';

    public const SEMESTER_SELECT = [
        '1' => 'Semester 1',
        '2' => 'Semester 2',
        '3' => 'Semester 3',
        '4' => 'Semester 4',
        '5' => 'Semester 5',
        '6' => 'Semester 6',
        '7' => 'Semester 7',
        '8' => 'Semester 8',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'semester',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function matkuliahBankSoalMateris()
    {
        return $this->hasMany(BankSoalMateri::class, 'matkuliah_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
