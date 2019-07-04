<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    const CRAWL_MODE = 'crawl';

    protected $fillable = [
        'name',
        'content',
        'publish',
        'posstion',
        'view_count',
        'story_id',
    ];

    public function story()
    {
        return $this->belongsTo('App\Models\Story');
    }
}
