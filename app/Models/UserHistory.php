<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model
{
    protected $fillable = [
        "user_id",
        "height",
        "weight",
        "activity_level"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
