<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = ['post_caption', 'post_image', 'user_id'];
    protected $table = 'posts';

    public function profile()
    {
        return $this->belongsTo(Profiles::class, 'user_id');
    }
    
    public function likes()
    {
        return $this->hasMany(Likes::class, 'post_id');
    }


    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

}
