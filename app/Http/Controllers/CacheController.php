<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CacheController extends Controller
{
    public function clear() {
        Artisan::call('cache:clear');
        $exitCode = Artisan::call('view:clear');
        if($exitCode === 0) {
            return redirect()->back()->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        }

        return 'Cannot Clear Cache';
    }
}
