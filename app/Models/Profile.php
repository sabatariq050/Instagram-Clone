<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //// Profile.php
    protected $fillable = ['user_id', 'description', 'url', 'profile_image'];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
