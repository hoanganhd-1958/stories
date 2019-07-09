<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function chapters()
    {
        return $this->hasMany('App\Models\Chapter')->orderBy('posstion', 'DESC');
    }
}
