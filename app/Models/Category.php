<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function stories()
    {
        return $this->belongsToMany(Story::class);
    }
}
