<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post_id', 'body'];

    public function user()
    {
        return $this->belongsTo(Profiles::class);
    }

    public function post()
    {
        return $this->belongsTo(Posts::class);
    }
}
