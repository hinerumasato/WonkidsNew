<?php

namespace App\Http\Controllers;

use App\Helpers\StringHelper;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index($slug) {
        $smallSliderTitle = trans('general.media');
        $title = trans('general.media');
        return view('client.media', compact('smallSliderTitle', 'title'));
    }
}
