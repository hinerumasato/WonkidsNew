<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostLanguageUploadImg extends Model
{
    use HasFactory;
    protected $table = 'posts_languages_upload_imgs';
    protected $fillable = ['upload_img_id', 'post_id', 'language_id'];

    public function uploadImgs(): BelongsTo {
        return $this->belongsTo(UploadImg::class);
    }

    public function posts(): BelongsTo {
        return $this->belongsTo(Post::class);
    }

    public function languages(): BelongsTo {
        return $this->belongsTo(Language::class);
    }

    public function findByRelatedId($post_id, $language_id, $upload_img_id) {
        return $this->where('post_id', $post_id)
            ->where('language_id', $language_id)
            ->where('upload_img_id', $upload_img_id)
            ->first();
    }
}
