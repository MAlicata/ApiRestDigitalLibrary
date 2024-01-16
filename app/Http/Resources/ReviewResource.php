<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $targetUserId = $this->user_id;
        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'bookId' => $this->book_id,
            'reviewText' => $this->review_text,
            'rating' => $this->rating
        ];
    }
}