<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaStagingArea extends Model
{
    use HasFactory;
    protected $table = 'media_staging_area';
    protected $fillable = ['content'];

    public function updateById($id, $value) {
        $area = $this->find($id);
        if($area != null) {
            $area->content = $value;
            $area->update();
            return true;
        }
        else return false;
    }

    public function refresh() {
        foreach ($this->all() as $item) {
            $item->content = null;
            $item->created_at = null;
            $item->updated_at = null;
            $item->update();
        }
    }
}
