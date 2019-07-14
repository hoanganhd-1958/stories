<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OneChapter extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'story_name' => $this->story->name,
            'publish' => $this->publish,
            'posstion' => $this->posstion,
            'view_count' => $this->view_count,
            'content' => $this->content,
        ];
    }
}
