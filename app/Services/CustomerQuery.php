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
    
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>'
    ];

    public function transform(Request $request) {
        $eloQuery = [];

        foreach($this->safeParams as $parm => $operators) {
            $query = $request->$parm;

            if(!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$parm] ?? $parm;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}