<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media_handlers extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'media_handlers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'path',
        'created_at',
        'updated_at',
        'deleted_at',
        'model_name',
        'model_id'
    ];

    // Helper functions
}
