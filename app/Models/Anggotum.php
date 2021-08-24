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

    private $const_ModelName = "anggotas";


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
        $query = $this->query()
            ->join('media_handlers', 'media_handlers.model_id', '=', 'anggota.id')
            ->where('media_handlers.model_id', '=', $this->id)
            ->where('media_handlers.model_name', '=', $this->const_ModelName)
            ->where('media_handlers.deleted_at', '=', null)
            ->get();

        // return single object instead of an array
        if (count($query) != 0) {
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
