<?php

namespace App\Http\Resources;

use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "restaurant" => Restaurant::find($this->restaurant_id)->only(['name']),
            "discount_id" => $this->discount_id,
            "details" => $this->items->each(function ($value, $key) {
                $value->food = FoodResource::make(Food::find($value->food_id));
            }),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
