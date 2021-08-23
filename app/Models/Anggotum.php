<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggotum extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'anggota';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'instagram_acc',
        'linkedin_acc',
        'keanggotaan',
        'created_at',
        'updated_at',
        'deleted_at',
        'department_id',
        'type',
        'caption'
    ];

    private $const_ModelName = "Anggota";

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this->addMediaConversion('thumb')->fit('crop', 50, 50);
    //     $this->addMediaConversion('preview')->fit('crop', 120, 120);
    // }

    // public function getImageAttribute()
    // {
    //     $file = $this->getMedia('image')->last();
    //     if ($file) {
    //         $file->url       = $file->getUrl();
    //         $file->thumbnail = $file->getUrl('thumb');
    //         $file->preview   = $file->getUrl('preview');
    //     }

    //     return $file;
    // }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    // Helper function to Set Media Handler NEW
    public function createMedia($image)
    {
        
    }

    // Helper function to Media Handler
    public function getMediaPath()
    {
        // should return an array
        return $this->belongsTo(Media_handlers::class, 'media_id');
    }
}
