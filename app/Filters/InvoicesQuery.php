<?php

namespace App\Filters;

use Illuminate\Http\Request;

class InvoicesQuery extends MainQuery {
    protected $safeParams = [
        'customer_id' => ['eq'],
        'amount' => ['eq', 'lt', 'gt'],
        'status' => ['eq'],
        'billed_date' => ['eq', 'lt', 'gt'],
        'paid_date' => ['eq', 'lt', 'gt']
    ];

        protected $columnMap = [
            'customerId' => 'customer_id',
            'billedDate' => 'billed_date',
            'paidDate' => 'paid_date'
        ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>'
    ];
}