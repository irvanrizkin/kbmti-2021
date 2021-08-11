<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HasTag extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'has_tags';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'article_id',
        'tag_id'
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    // Helper function
    public function article(){
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function tag(){
        return $this->belongsTo(Tag::class, 'tag_id');
    }
}
