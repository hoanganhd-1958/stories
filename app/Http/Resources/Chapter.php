<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Chapter extends JsonResource
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
            'publish' => $this->publish,
            'posstion' => $this->posstion,
            'view_count' => $this->view_count,
            'has_content' => $this->content == null ? false : true,
            'created_at' => $this->created_at->format('d/m/Y')
        ];
    }
}
