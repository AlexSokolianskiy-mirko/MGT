<?php

namespace App\Http\Resources\Token;

use App\Http\Resources\Point\PointResource;
use App\Http\Resources\Tag\TagResource;
use App\Models\Tag;
use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'location' => new PointResource($this->location),
            'tags' => TagResource::collection($this->tags)
        ];
    }
}
