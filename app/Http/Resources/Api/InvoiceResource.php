<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'customerId' => $this->customer_id,
            'amount' => $this->amount,
            'status' => $this->status == 'V' ? 'Void' : ($this->status == 'P' ? 'Paid' : 'Billed'),
            'billedDate' => $this->billed_date,
            'paidDate' => $this->paid_date
        ];
    }
}
