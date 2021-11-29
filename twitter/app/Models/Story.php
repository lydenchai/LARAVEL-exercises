<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'original_name',
        'size'
    ];
    protected $primaryKey = 'story_id';
}
