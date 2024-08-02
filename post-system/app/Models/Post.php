<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    const storageFolder = 'Posts';

    protected $fillable = [
        'content',
        'user_id',
    ];
    public function postPhotos()
    {
        return $this->hasMany(PostPhoto::class);
    } 
 
}
