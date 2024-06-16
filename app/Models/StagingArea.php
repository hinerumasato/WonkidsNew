<?php

namespace App\Models;

use App\Helpers\StringHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StagingArea extends Model
{
    use HasFactory;
    protected $table = 'staging_area';
    protected $fillable = ['link', 'name'];

    public function getImgLinks() {
        $allLinks = $this->getAllLinks();
        $result = [];
        foreach ($allLinks as $link) {
            $extension = explode('.', $link)[1];
            if(StringHelper::isImageFile($extension))
                $result[] = $link;
        }
        return $result;
    }

    public function getOtherFileLinks() {
        $allLinks = $this->getAllLinks();
        $result = [];
        foreach ($allLinks as $link) {
            $extension = explode('.', $link)[1];
            if(!StringHelper::isImageFile($extension))
                $result[] = $link;
        }
        return $result;
    }

    public function getAllImage() {
        $all = $this->all();
        $result = [];
        foreach ($all as $item) {
            $extension = StringHelper::getExtension($item->link);
            if(StringHelper::isImageFile($extension))
                $result[] = $item;
        }
        return collect($result);
    }

    public function getAllOtherFiles() {
        $all = $this->all();
        $result = [];
        foreach ($all as $item) {
            $extension = StringHelper::getExtension($item->link);
            if(!StringHelper::isImageFile($extension))
                $result[] = $item;
        }
        return collect($result);
    }

    public function getAllLinks() {
        $result = [];
        foreach ($this->all() as $item) {
            $result[] = $item->link;
        }
        return $result;
    }

    public function deleteAll() {
        foreach ($this->all() as $item) {
            $this->delete();
        }
    }

    public function findById($id) {
        return $this->find($id);
    }

    public function deleteByLink($link) {
        $deleteItem = $this->where('link', $link)->first();
        if($deleteItem != null) {
            $deleteItem->delete();
            return true;
        }
        return false;
    }
}
