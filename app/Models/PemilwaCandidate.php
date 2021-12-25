<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Interfaces\MediaModelInterface;
use App\StaticVars\MediaHandler as StaticVarMediaHandler;

class PemilwaCandidate extends Model implements MediaModelInterface
{
    use HasFactory;
    use SoftDeletes;

    public const TYPE_SELECT = [
        'BPMTI' => 'BPMTI',
        'EMTI'  => 'EMTI',
    ];

    public $table = 'pemilwa_candidates';
    private $const_ModelName = StaticVarMediaHandler::PemilwaCandidate;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'no_urut',
        'type',
        'pemilwa_event_id',
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
    public function pemilwaEvent()
    {
        return $this->belongsTo(PemilwaEvent::class, 'pemilwa_event_id');
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
