<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'post_catalogue_id',
        'image',
        'icon',
        'album',
        'publish',
        'order'
    ];

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }
}