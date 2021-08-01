<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventRegistration extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'event_registrations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'dummy_name',
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

    // Relation to eventFieldResponse
    public function eventFieldResponses()
    {
        return $this->hasMany(EventFieldResponse::class, 'event_registration_id');
    }

    // Helper Organisasi
    public function getOrganisasiArrayAttribute($eventRegistrationId)
    {
        $query = $this->query()
            ->join('event_field_responses', 'event_field_responses.event_registration_id', '=', 'event_registrations.id')
            ->join('event_fields', 'event_field_responses.event_field_id', '=', 'event_field.id')
            ->select('event_registrations.id', 'event_fields.name', 'event_field_responses.response')
            ->where(function ($q) {
                $q->where('name', '=', 'Organisasi')
                    ->orWhere('name', '=', 'Tahun_Organisasi');
            })
            ->where('event_registrations.id', '=', $eventRegistrationId)
            ->get();
        return $query;
    }

    // Helper Kepanitiaan
    public function getKepanitiaanArrayAttribute($eventRegistrationId)
    {
        $query = $this->query()
            ->join('event_field_responses', 'event_field_responses.event_registration_id', '=', 'event_registrations.id')
            ->join('event_fields', 'event_field_responses.event_field_id', '=', 'event_field.id')
            ->select('event_registrations.id', 'event_fields.name', 'event_field_responses.response')
            ->where(function ($q) {
                $q->where('name', '=', 'Kepanitiaan')
                    ->orWhere('name', '=', 'Tahun_Kepanitiaan');
            })
            ->where('event_registrations.id', '=', $eventRegistrationId)
            ->get();
        return $query;
    }

    // Helper pemberkasan
    public function getPemberkasanAttribute($eventRegistrationId)
    {
        $query = $this->query()
            ->join('event_field_responses', 'event_field_responses.event_registration_id', '=', 'event_registrations.id')
            ->join('event_fields', 'event_field_responses.event_field_id', '=', 'event_field.id')
            ->select('event_registrations.id', 'event_fields.name', 'event_field_responses.response')
            ->where('name', '=', 'Pemberkasan')
            ->where('event_registrations.id', '=', $eventRegistrationId)
            ->get();
        return $query;
    }
}
