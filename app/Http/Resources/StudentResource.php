<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'user' => new UserResource($this->user),
            'classroom_id' => $this->classroom_id,
            'birth_date' => $this->birth_date,
            'parent_name' => $this->parent_name,
            'parent_number' => $this->parent_number,
            'address' => $this->address,
            'status' => $this->status,
        ];
    }
}
