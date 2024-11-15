<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Weight;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use stdClass;

class WeightController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $weights = new stdClass(); 
        $weights->weight = Weight::all();
        $weights->collection = $weights->weight->map(function ($weight) {
            return [
                'id' => $weight->id,
                'name' => $weight->name,
            ];
        });
        return $this->ok('Weights Retrieved Successfully', $weights->collection);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
