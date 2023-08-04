<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
