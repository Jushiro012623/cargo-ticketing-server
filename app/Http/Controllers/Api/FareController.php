<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\DiscountResource;
use App\Http\Resources\Api\TransactionFareResource;
use App\Models\Discount;
use App\Models\Fare;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class FareController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $query = Fare::with('route');
        // if ($request->has('transportation_type')) {
        //     $query->whereHas('route', function($query) use ($request) {
        //         $query->where('transportation_type', $request->transportation_type);
        //     });
        // }
        // $routes = $query->limit(4)->get();
        // return $routes;
        // return $query->get();
    }

    public function showTransactionFare(Request $request){
        // TODO TRNSACTIONFARE REQUEST
        $FARE = Fare::where('route_id', $request->route_id)
                ->where('length', $request->type_id == 2 ? $request->weight  :  null)
                ->where('type_id', $request->type_id)->first();
        $DISCOUNT = Discount::findOrFail($request->type_id == 1 ?  $request->discount_id : 1);
        $DATA = [
            'fare' => new TransactionFareResource($FARE),
            'discount' => [
                'name' => $DISCOUNT->name, 
                'ammount_off' => $DISCOUNT->description, 
                'deduction' => $DISCOUNT->percentage
            ]
        ];
        return $this->ok('Fare retrieved successfully', $DATA);
    }
    public function store(Request $request)
    {

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
