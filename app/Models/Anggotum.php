<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Anggotum extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const KEANGGOTAAN_SELECT = [
        'Ketua Himpunan'                 => 'Ketua Himpunan',
        'Wakil Ketua Himpunan'           => 'Wakil Ketua Himpunan',
        'Relation and Creative'          => 'Relation and Creative',
        'Entrepreneurship'               => 'Entrepreneurship',
        'Administrative'                 => 'Administrative',
        'Human and Resource Development' => 'Human and Resource Development',
        'Advocacy'                       => 'Advocacy',
        'Research and Development'       => 'Research and Development',
        'Social Environment'             => 'Social Environment',
    ];

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
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
