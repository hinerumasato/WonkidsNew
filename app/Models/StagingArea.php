<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StagingArea extends Model
{
    use HasFactory;
    protected $table = 'staging_area';
    protected $fillable = ['link', 'file_name', 'contents'];
}
