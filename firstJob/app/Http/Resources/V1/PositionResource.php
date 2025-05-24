<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class PositionResource extends JsonResource
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
            'companyId' => $this->company_id,
            'title' => $this->title,
            'description' => $this->description,
            'location' => $this->location,
            'employment_type' => $this->employment_type,
            'salary' => $this->salary,
            'created' => Carbon::parse($this->created_at)->format('d-m-Y H-i') ,
            'updated' => Carbon::parse($this->updated_at)->format('d-m-Y H-i'),

        ];
    }
}
