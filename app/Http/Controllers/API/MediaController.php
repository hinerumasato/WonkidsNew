<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PostLanguageMedia;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function upload(Request $request) {
        $postLanguageMediaModel = new PostLanguageMedia();
        $post_id = $request->post_id;
        $language_id = $request->language_id;
        $medias = $postLanguageMediaModel->getByPostIdLanguageId($post_id, $language_id);
        foreach ($medias as $media) {
            $content = $request->input($media->media_id);
            $media->content = $content;
            $media->update();
        }

        return response()->json([
            'message' => 'success',
        ]);
        
    }
}
