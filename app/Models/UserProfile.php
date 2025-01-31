<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        "user_id",
        "age",
        "gender",
        "height",
        "weight",
        "activity_level"
    ];
}
