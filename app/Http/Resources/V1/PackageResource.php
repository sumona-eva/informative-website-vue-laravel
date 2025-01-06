<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'sub_titles' => json_decode($this->sub_titles),
            'items' => json_decode($this->items),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
