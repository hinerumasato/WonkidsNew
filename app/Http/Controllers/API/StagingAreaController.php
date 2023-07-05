<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StagingArea;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class StagingAreaController extends Controller
{

    public function upload(Request $request) {

        $file = $request->file('file');
        $extension = $file->guessExtension();
        $originName = $file->getClientOriginalName();

        
        $uuidFile = Str::uuid($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/posts'), $uuidFile);

        StagingArea::create([
            'link' => asset('uploads/posts/'. $uuidFile),
            'name' => $originName,
        ]);

        return response()->json([
            'location' => asset('uploads/posts/'. $uuidFile),
            'name' => $originName,
            'extension' => $extension,
        ], 200);
    }

    public function deleteOne(Request $request) {
        $areaModel = new StagingArea();
        $location = $request->input('location');
        $deleted = $areaModel->deleteByLink($location);
        if($deleted == true) {
            $path = substr(parse_url($location, PHP_URL_PATH), 1);
            File::delete($path);
            return response()->json([
                'message' => 'success',
            ], 200);
        }

        else {
            return response()->json([
                'message' => 'failed',
            ], 200);
        }
    }
}
