<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\StagingArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Ramsey\Uuid\Uuid;

class UploadController extends Controller
{
    public function upload(Request $request) {
        $fileName = $request->fileName;
        $base64_decode = base64_decode($request->contents);
        $newFileName = Uuid::uuid4().'.'.pathinfo($fileName, PATHINFO_EXTENSION);
        $link = asset('uploads/posts/'.$newFileName);
        $path = parse_url($link, PHP_URL_PATH);
        $path = substr($path, 1);
        
        StagingArea::create([
            'link' => $link,
            'file_name' => $newFileName,
            'contents' => $request->contents,
            'decode' => $base64_decode,
        ]);

        $allAreas = StagingArea::all();
        
        File::delete($path);
        return response()->json([
            'src' => $request->contents,
            'fileQuantity' => count($allAreas),
            'link' => $link
        ], 200);
    }
}
