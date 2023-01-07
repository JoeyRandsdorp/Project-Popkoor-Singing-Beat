<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $fillable = [
      'title',
      'artist',
      'lyrics',
      'translation',
      'sheet_music',
      'full_song',
      'image',
      'date'
    ];
}
