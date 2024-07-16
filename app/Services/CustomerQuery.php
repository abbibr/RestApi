<?php

namespace App\Services;

use Illuminate\Http\Request;

class CustomerQuery {
    protected $safeParams = [
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'postalCode' => ['eq', 'gt', 'lt']
    ];

    protected $columnMap = [
        'postalCode' => 'postal_code'
    ];
    
    protected $operators = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>'
    ];

    public function transform(Request $request) {
        return $request->all();
    }
}