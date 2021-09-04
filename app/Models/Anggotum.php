<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Interfaces\MediaModelInterface;
use App\StaticVars\MediaHandler as StaticVarMediaHandler;

class Anggotum extends Model implements MediaModelInterface
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'anggota';

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

    private $const_ModelName = StaticVarMediaHandler::AnggotaModelName;

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    // Helper function to Media Handler
    public function getMediaPath()
    {
        // should return an array
        $query = $this->query()
            ->join('media_handlers', 'media_handlers.model_id', '=', 'anggota.id')
            ->where('media_handlers.model_id', '=', $this->id)
            ->where('media_handlers.model_name', '=', $this->const_ModelName)
            ->where('media_handlers.deleted_at', '=', null)
            ->get();

        // return single object instead of an array
        if (count($query) != 0) {
            // Add new sub attribute about preview and
            $item = $query[0];
            $item->imageUrl = $this->getUrlPath($item->path);
            $item->thumbnail = $this->getThumbnailUrlPath($item->path);
            $item->preview = $this->getPreviewUrlPath($item->path);
            return $item;
        }

        return null;
    }

    // Implements from MedialModelInterface
    public function getUrlPath($path = "")
    {
        if ($path) {
            return url(env("ASSET_URL", "") . "/storage/$this->const_ModelName/$path");
        }
        return url(env("ASSET_URL", "") . "/storage/$this->model_name/$this->path");
    }

    // Implements from MediaModelInterfaces
    public function getPreviewUrlPath($path = "")
    {
        if ($path) {
            return url(env("ASSET_URL", "") . "/storage/$this->const_ModelName/previews/$path");
        }
        return url(env("ASSET_URL", "") . "/storage/$this->const_ModelName/previews/$this->path");
    }

    // Helper functions to get thumbnail url path
    public function getThumbnailUrlPath($path = "")
    {
        if ($path) {
            return url(env("ASSET_URL", "") . "/storage/$this->const_ModelName/thumbails/$path");
        }
        return url(env("ASSET_URL", "") . "/storage/$this->const_ModelName/thumbails/$this->path");
    }
}
