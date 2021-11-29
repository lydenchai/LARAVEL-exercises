<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'is_done'];

    protected $casts = [
        'is_done' => 'boolean',
        'created_at' => 'datetime: Y-m-d H:i:s',
    ];

    protected $hidden = [
        'updated_at'
    ];
}
