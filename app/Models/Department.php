<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Spatie\MediaLibrary\HasMedia;
// use Spatie\MediaLibrary\InteractsWithMedia;
// use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Department extends Model
{
    use SoftDeletes;
    // use InteractsWithMedia;
    use HasFactory;

    public const TYPE_SELECT = [
        'EMTI'  => 'EMTI',
        'BPMTI' => 'BPMTI',
    ];

    public const SUB_TYPE_SELECT = [
        'Department'     => 'Department',
        'Non-Department' => 'Non-Department',
    ];

    public $table = 'departments';

    // protected $appends = [
    //     'logo',
    // ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'initial',
        'description',
        'type',
        'sub_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    private $const_ModelName = "departments";

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this->addMediaConversion('thumb')->fit('crop', 50, 50);
    //     $this->addMediaConversion('preview')->fit('crop', 120, 120);
    // }

    // public function getLogoAttribute()
    // {
    //     $file = $this->getMedia('logo')->last();
    //     if ($file) {
    //         $file->url       = $file->getUrl();
    //         $file->thumbnail = $file->getUrl('thumb');
    //         $file->preview   = $file->getUrl('preview');
    //     }

    //     return $file;
    // }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    // To Anggota
    public function anggotas()
    {
        return $this->hasMany(Anggotum::class, 'department_id', 'id');
    }

    // Helper function to Media Handler
    public function getMediaPath()
    {
        // should return an array
        $query = $this->query()
            ->join('media_handlers', 'media_handlers.model_id', '=', 'departments.id')
            ->where('media_handlers.model_id', '=', $this->id)
            ->where('media_handlers.model_name', '=', $this->const_ModelName)
            ->where('media_handlers.deleted_at', '=', null)
            ->get();

        // return single object instead of an array
        if ( count($query) != 0 ) {
            return $query[0];
        }

        return null;
    }

    // Helper functions to get url path
    public function getUrlPath()
    {
        return url("/storage/$this->model_name/$this->path");
    }
}
