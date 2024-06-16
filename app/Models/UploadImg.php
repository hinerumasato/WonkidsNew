<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UploadImg extends Model
{
    use HasFactory;
    protected $table = 'upload_imgs';
    protected $fillable = ['link', 'name'];

    public function findById($id) {
        return $this->find($id);
    }
}
