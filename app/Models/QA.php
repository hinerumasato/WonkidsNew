<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QA extends Model
{
    use HasFactory;
    protected $table = 'qa';
    protected $fillable = ['name', 'email', 'phone', 'message', 'title'];
}
