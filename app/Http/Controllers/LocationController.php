<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    
    public function index()
    {
        $locations = Location::all();
        dd($locations);
    }

    public function create()
    {
        //
    }
    
    public function store(StoreLocationRequest $request)
    {
        $validatedRequest = $request->validated();
        $location = Location::create($validatedRequest);
        dd($location);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }
    
    public function update(Request $request, string $id)
    {
        //
    }
    
    public function destroy(string $id)
    {
        //
    }
}
