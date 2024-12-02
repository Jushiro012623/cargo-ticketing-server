<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\FetchFareRequest;
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
    private $fareDiscount;
    public function __construct(){
        $this->fareDiscount = new PaymentService();
    }
    public function __invoke(FetchFareRequest $request)
    {
        $fare = Fare::where('route_id', $request->route_id)
        ->where('type_id', $request->type_id)
        ->where(function($query) use ($request) {
            $request->type_id == 2 ? $query->where('weight_id', $request->weight_id) : $query->whereNull('weight_id');
        })
        ->first();
        // dd($fare);
        // $fare_resource = new TransactionFareResource($fare);
        
        $fare_discount = $this->fareDiscount->getDiscount($request, $fare);

        return $this->ok('Fare retrieved successfully', $fare_discount);
    }
}
