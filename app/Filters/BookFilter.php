<?php

namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class BookFilter extends ApiFilter{

    protected $safeParams = [
        'title' => ['eq'],
        'author' => ['eq'],
        'publication_year' => ['eq'],
        'pages' => ['eq']
    ];
    protected $columnMap = [
        
    ];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte'=> '<=',
        'gt' => '>',
        'gte' => '>='
    ];

 
}




?>