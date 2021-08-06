<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventField extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TYPE_SELECT = [
        'dropdown' => 'Dropdown',
        'text'     => 'Text',
        'number'   => 'Number',
    ];

    public $table = 'event_fields';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'type',
        'name',
        'event_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
