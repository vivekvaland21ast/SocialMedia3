<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'post_id', 'user_id', 'parent_id'];

    public function user()
    {
        return $this->belongsTo(Profiles::class);
    }

    public function post()
    {
        return $this->belongsTo(Posts::class);
    }
    public function replies()
    {
        return $this->hasMany(Comments::class, 'parent_id');
    }
}
