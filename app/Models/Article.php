<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Interfaces\MediaModelInterface;


class Article extends Model implements MediaModelInterface
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'articles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'content',
        'counter',
        'bureau',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const BUREAU_SELECT = [
        'HRD'  => 'HRD',
        'ADVO' => 'Advocacy',
        'SE' => 'Social Environment',
        'RND' => 'Research and Development',
        'RNC' => 'Relation and Creative',
        'ENTRE' => 'Entrepreneurship'
    ];

    private $const_ModelName = "articles";

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    // Helper functions to detect tag
    public function hasTag()
    {
        return $this->hasMany(HasTag::class, 'article_id');
    }

    // Helper function to deterine if tag is exist or not
    public function isTagExist()
    {
        $query = $this->query()
            ->join('has_tags', 'has_tags.article_id', '=', 'articles.id')
            ->join('tags', 'has_tags.tag_id', '=', 'tags.id')
            ->where('articles.id', '=', $this->id)
            ->get();
        return $query;
    }

    // Helper funtion to Media Handler
    public function getMediaPath()
    {
        // should return an array of media handlers
        $query = $this->query()
            ->join('media_handlers', 'media_handlers.model_id', '=', 'articles.id')
            ->where('media_handlers.model_id', '=', $this->id)
            ->where('media_handlers.model_name', '=', $this->const_ModelName)
            ->where('media_handlers.deleted_at', '=', null)
            ->get();
        if (count($query) != 0) {
            foreach ($query as $item) {
                $item->imageUrl = $this->getUrlPath($item->path);
                $item->thumbnail = $this->getThumbnailUrlPath($item->path);
                $item->preview = $this->getPreviewUrlPath($item->path);
            }
            return $query;
        }

        return null;
    }

    // Helper function return array only
    public function getArrayOnlyPath()
    {
        $query = $this->query()
            ->join('media_handlers', 'media_handlers.model_id', '=', 'articles.id')
            ->where('media_handlers.model_id', '=', $this->id)
            ->where('media_handlers.model_name', '=', $this->const_ModelName)
            ->where('media_handlers.deleted_at', '=', null)
            ->select("media_handlers.path")
            ->get();

        // return single object instead of an array
        if (count($query) != 0) {
            $array = [];
            foreach ($query as $item) {
                array_push($array, $item->path);
            }
            return $array;
        }

        return [];
    }

    // Helper functions to get url path
    public function getUrlPath($path = "")
    {
        if ($path) {
            return url("/storage/$this->const_ModelName/$path");
        }
        return url("/storage/$this->model_name/$this->path");
    }

    // Implements from MediaModelInterfaces
    public function getPreviewUrlPath($path = "")
    {
        if ($path) {
            return url("/storage/$this->const_ModelName/previews/$path");
        }
        return url("/storage/$this->const_ModelName/previews/$this->path");
    }

    // Helper functions to get thumbnail url path
    public function getThumbnailUrlPath($path = "")
    {
        if ($path) {
            return url("/storage/$this->const_ModelName/thumbails/$path");
        }
        return url("/storage/$this->const_ModelName/thumbails/$this->path");
    }
}
