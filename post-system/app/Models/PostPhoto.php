<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostPhoto extends Model
{
    use HasFactory;

   


    protected $fillable = [
        'content',
        'post_id',
        'photo',
    ]; 

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
