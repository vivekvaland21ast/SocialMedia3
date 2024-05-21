<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];
    protected $fillable = ['user_id', 'friend_id'];

    public function user()
    {
        return $this->belongsTo(Profiles::class, 'user_id');
    }

    public function friend()
    {
        return $this->belongsTo(Friends::class, 'friend_id');
    }
    
}
