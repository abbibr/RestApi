<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'amount',
        'status',
        'billed_date',
        'paid_date'
    ];

    public function customers() {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
