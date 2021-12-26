<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemilwaVoter extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'pemilwa_voters';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nim',
        'email',
        'token',
        'pemilwa_event_id',
        'is_done',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Helper function to format the date
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    // Helper function belongs to pemilwa event
    public function pemilwa_event()
    {
        return $this->belongsTo(PemilwaEvent::class, 'pemilwa_event_id');
    }
}
