<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class FareController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
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
