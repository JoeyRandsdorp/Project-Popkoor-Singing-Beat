<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepertoireSong extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'artist',
        'song',
        'image',
        'date',
        'visibility'
    ];
}
