<?php

namespace App\Models;

use App\Helpers\StringHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'sliders';
    protected $fillable = ['links'];

    public function saveImage($uuidFile) {
        $links = asset('imgs/sliders/' . $uuidFile);
        $this->create([
            'links' => $links,
        ]);
    }

    public function getLatestImage() {
        return $this->latest('id')->first();
    }

    public function deleteByLink($link) {
        $slider = $this->all()->where('links', $link)->first();
        if($slider != null) {
            $path = StringHelper::getParseUrlPath($slider->links);
            File::delete($path);
            $slider->delete();
            return true;
        }
        return false;
    }
}
