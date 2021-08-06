<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventFieldChoice extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'event_field_choices';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'choice',
        'event_field_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function event_field()
    {
        return $this->belongsTo(EventField::class, 'event_field_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
