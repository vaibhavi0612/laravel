<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'county' => $this->county,
            'country'=>$this->country,
            'town'=>$this->town,
            'description'=>$this->description,
            'full_details_url'=>$this->full_details_url,
            'displayable_address'=>$this->displayable_address,
            'image_url'=>$this->image_url,
            'thumbnail_url'=>$this->thumbnail_url,
            'latitude'=>$this->latitude,
            'longitude'=>$this->longitude,
            'num_bedrooms'=>$this->num_bedrooms,
            'num_bathrooms'=>$this->num_bathrooms,
            'price'=>$this->price,
            'type'=>$this->type,
            'property_type'=>$this->property_type
        ];
        return $data;
    }
}
