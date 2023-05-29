<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $table;
    protected $fillable = ['category_id'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function languages(): BelongsToMany {
        return $this->belongsToMany(Language::class, 'posts_has_languages')->withPivot('title', 'content')->withTimestamps();
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
