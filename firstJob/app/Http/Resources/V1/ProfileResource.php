<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'clientId' => $this->client_id,
            'phone' => $this->phone,
            'bio' => $this->bio,
            'location' => $this->location,
            'skills' => $this->skils,
            'created' => Carbon::parse($this->created_at)->format('d-m-Y H-i') ,
            'updated' => Carbon::parse($this->updated_at)->format('d-m-Y H-i'),
        ];
    }
}
