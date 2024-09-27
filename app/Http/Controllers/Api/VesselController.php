<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\VesselResource;
use App\Models\Vessel;
use Illuminate\Http\Request;

class VesselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vessels = Vessel::all();
        $response = VesselResource::collection($vessels);
        return $response;
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