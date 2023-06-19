<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StagingArea extends Model
{
    use HasFactory;
    protected $table = 'staging_area';
    protected $fillable = ['link'];

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
