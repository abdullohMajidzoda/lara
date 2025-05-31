<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ApplicationResource extends JsonResource
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
            'position_id' => $this->position_id,
            'user_id' => $this->user_id,
            'cover_letter' => $this->cover_letter,
            'status' => $this->status,
            'created' => Carbon::parse($this->created_at)->format('d-m-Y H-i') ,
            'updated' => Carbon::parse($this->updated_at)->format('d-m-Y H-i'),            
        ];
    }
}
