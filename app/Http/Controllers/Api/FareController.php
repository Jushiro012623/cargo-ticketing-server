<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fare;
use Illuminate\Http\Request;

class FareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $fares = Fare::all();
        // $routes = $fares->pluck('route'); // Assuming 'route' is a column in your fares table
        // return $routes;
        $query = Fare::with('route');
        if ($request->has('transportation_type')) {
            $query->whereHas('route', function($query) use ($request) {
                $query->where('transportation_type', $request->transportation_type);
            });
        }
        $routes = $query->limit(4)->get();
        return $routes;

        // $response = RouteResource::collection($routes);
        // return $response;

        $fare = Fare::with('route')->get();
        return $fare;

        // return $query->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
