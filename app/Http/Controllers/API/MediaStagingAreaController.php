<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MediaStagingArea;
use Illuminate\Http\Request;

class MediaStagingAreaController extends Controller
{
    public function upload(Request $request) {
        $mediaAreaModel = new MediaStagingArea();
        foreach ($request->all() as $key => $value) {
            if(!$mediaAreaModel->updateById($key, $value))
                return response()->json([
                    'message' => 'failed',
                ]);
        }

        return response()->json([
            'message' => 'success',
        ]);
    }
}
