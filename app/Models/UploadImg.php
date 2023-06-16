<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UploadImg extends Model
{
    use HasFactory;
    protected $table = 'upload_imgs';
    protected $fillable = ['link'];
}
