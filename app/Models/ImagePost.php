<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagePost extends Model
{  protected $fillable = ['user_id', 'image', 'caption'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //
}
