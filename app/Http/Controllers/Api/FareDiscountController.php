<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\FetchFareRequest;
use App\Http\Resources\Api\DiscountResource;
use App\Http\Resources\Api\TransactionFareResource;
use App\Models\Fare;
use App\Services\PaymentService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use stdClass;

class FareDiscountController extends Controller
{
    use ApiResponse;
    /**
     * Handle the incoming request.
     */
    
    private $fare;
    public function __construct(){
        $this->fare = new PaymentService();
    }
    public function __invoke(FetchFareRequest $request)
    {
        $calulate_fares = $this->fare->calculateFares($request);
        $total_fares = new DiscountResource($calulate_fares);
        return $this->ok('Fare retrieved successfully', $total_fares);
    }
}
