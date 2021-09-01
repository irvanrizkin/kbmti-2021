<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Interfaces\MediaModelInterface;
use App\Static\MediaHandler as StaticVarMediaHandler;

class Department extends Model implements MediaModelInterface
{
    use SoftDeletes;
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

    private $const_ModelName = StaticVarMediaHandler::DepartmentModelName;

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
        return url(env("ASSET_URL", "") . "/storage/$this->const_ModelName/$this->path");
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
