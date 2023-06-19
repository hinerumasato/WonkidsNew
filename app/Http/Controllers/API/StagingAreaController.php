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

        $image = $request->file('file');
        
        
        $uuidFile = Str::uuid($image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/posts'), $uuidFile);

        StagingArea::create([
            'link' => asset('uploads/posts/'. $uuidFile),
        ]);

        return response()->json([
            'location' => asset('uploads/posts/'. $uuidFile),
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
