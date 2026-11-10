<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'sku' => $this->sku,
            'name' => $this->nama,
            'price' => $this->harga,
            'price_format' => 'Rp '.number_format(
                $this->harga, 0, ',', '.'),
            'stock' => $this->stok,
            'created_at' => $this->created_at
                ->format('d-m-Y'),
        ];
    }
}
