<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLanguageMedia extends Model
{
    use HasFactory;
    protected $table = 'posts_languages_medias';
    protected $fillable = ['post_id', 'language_id', 'media_id', 'title', 'content'];

    public function insert($post_id, $language_id, $media_id, $title, $content) {
        $this->create([
            'post_id' =>  $post_id, 
            'language_id' =>  $language_id, 
            'media_id' =>  $media_id, 
            'title' =>  $title, 
            'content' =>  $content,
        ]);
    }
}
