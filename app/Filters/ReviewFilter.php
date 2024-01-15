<?php
namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class ReviewFilter extends ApiFilter{

    protected $safeParams = [
        'user_id' => ['eq'],
        'book_id' => ['eq'],
        'review_text' => ['eq'],
        'rating' => ['eq', 'lt', 'lte','gt','gte']
    ];
    protected $columnMap = [
        
    ];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte'=> '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!='
    ];
 
}
?>