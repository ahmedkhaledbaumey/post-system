<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    const storageFolder = 'Users';
    use HasFactory;
    const privacy = ['private', 'public'];
    protected $fillable = ['profile_photo', 'cover_photo', 'privacy', 'skills'];
    protected $casts = [
        "skills" => 'json'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
