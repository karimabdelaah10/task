<?php

namespace App\Modules\User\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => UserResource::collection($this),
            'current_page' => $this->currentPage(),
            'is_last_page' => $this->currentPage() == $this->lastPage() ? true : false,
            'last_page' => $this->lastPage(),
            'path' => $this->path(),
            'per_page' => $this->perPage(),
            'total' => $this->total(),
        ];
    }
}
