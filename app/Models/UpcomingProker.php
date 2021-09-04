<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Interfaces\MediaModelInterface;
use App\StaticVars\MediaHandler as StaticVarMediaHandler;

class UpcomingProker extends Model implements MediaModelInterface
{
    use SoftDeletes;
    use HasFactory;

    public const IS_ACTIVE_SELECT = [
        '1' => 'On',
        '0' => 'Off',
    ];

    public $table = 'upcoming_prokers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'caption',
        'description',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    private $const_ModelName = StaticVarMediaHandler::UpcomingProkerModelName;

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    // Helper funtion to Media Handler
    public function getMediaPath()
    {
        // should return an array of media handlers
        $query = $this->query()
            ->join('media_handlers', 'media_handlers.model_id', '=', 'upcoming_prokers.id')
            ->where('media_handlers.model_id', '=', $this->id)
            ->where('media_handlers.model_name', '=', $this->const_ModelName)
            ->where('media_handlers.deleted_at', '=', null)
            ->get();
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

    // Helper functions to get url path
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
