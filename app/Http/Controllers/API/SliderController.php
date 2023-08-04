<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    private $sliderModel;

    public function __construct()
    {
        $this->sliderModel = new Slider();
    }

    public function upload(Request $request) {
        $file = $request->file('file');
        $uuidFile = Str::uuid($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('imgs/sliders'), $uuidFile);
        $this->sliderModel->saveImage($uuidFile);
        return response()->json([
            'message' => 'success',
            'link' => $this->sliderModel->getLatestImage()->links,
        ]);
    }
}