<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SliderDescription;
use Illuminate\Http\Request;

class SliderDescriptionController extends Controller
{
    public function update(Request $request) {
        $sliderDescriptionModel = new SliderDescription();
        foreach ($request->all() as $locale => $value) {
            $sliderDescriptionModel->updateByLocale($locale, $value);
        }

        return response()->json([
            'message' => 'success',
        ]);
    }
}
