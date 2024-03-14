<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceAreaRequest;
use App\Models\ServiceArea;
use Illuminate\Http\Request;

class ServiceAreaController extends Controller
{
    public function index ()
    {
        $service_areas = ServiceArea::all();
        dd($service_areas);
    }

    public function store (StoreServiceAreaRequest $request)
    {
        $validatedRequest = $request->validated();
        $service_areas = ServiceArea::create($validatedRequest);

        dd($service_areas);
    }
}
