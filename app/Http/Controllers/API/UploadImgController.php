<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\StagingArea;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\UploadImg;
use App\Models\PostLanguageUploadImg;
use Illuminate\Support\Facades\File;

class UploadImgController extends Controller
{
    public function upload(Request $request) {

        $file = $request->file('file');
        $extension = $file->guessExtension();
        $originName = $file->getClientOriginalName();

        $language_id = $request->language_id;
        $post_id = $request->post_id;
        $uuidFile = Str::uuid($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/posts'), $uuidFile);


        $uploadImg = UploadImg::create([
            'link' => asset('uploads/posts/'. $uuidFile),
            'name' => $originName,
        ]);

        PostLanguageUploadImg::create([
            'post_id' => $post_id,
            'language_id' => $language_id,
            'upload_img_id' => $uploadImg->id,
        ]);

        return response()->json([
            'location' => asset('uploads/posts/'. $uuidFile),
            'name' => $originName,
            'extension' => $extension,
        ], 200);
    }

    public function deleteOne(Request $request) {
        $postLanguageImg = new PostLanguageUploadImg();

        $location = $request->input('location');
        $post_id = $request->input('post_id');
        $language_id = $request->input('language_id');

        
        $uploadImg = UploadImg::where('link', $location)->first();
        
        if($uploadImg == null) {
            return response()->json([
                'message' => 'Cannot find link',
            ]);
        }

        $deleteItem = $postLanguageImg->findByRelatedId($post_id, $language_id, $uploadImg->id);
        if($deleteItem != null) {
            $path = substr(parse_url($uploadImg->link, PHP_URL_PATH), 1);
            File::delete($path);
            $deleteItem->delete();
            $uploadImg->delete();
        }
        else {
            return response()->json([
                'message' => 'Cannot find Post',
            ]);
        }
        return response()->json([
            'message' => 'success',
        ], 200);
    }
}
