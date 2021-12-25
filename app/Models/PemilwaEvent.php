<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemilwaEvent extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const IS_ACTIVE_SELECT = [
        'Active'   => 'Active',
        'Archived' => 'Archived',
    ];

    public $table = 'pemilwa_events';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tahun',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Helper function to format the date
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    // Helper function has many candidate
    public function pemilwaCandidate()
    {
        return $this->hasMany(PemilwaCandidate::class, 'pemilwa_event_id');
    }

    // Helper function has many voter
    public function pemilwaVoter()
    {
        return $this->hasMany(PemilwaVoter::class, 'pemilwa_event_id');
    }

    // Helper function has many vote
    public function pemilwaVote()
    {
        return $this->hasMany(PemilwaVote::class, 'pemilwa_event_id');
    }
}
