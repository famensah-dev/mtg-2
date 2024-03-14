<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCampaignRequest;
use App\Models\Campaign;
use App\Models\Location;
use App\Models\Tenant;
use Illuminate\Http\Request;

class CampaignController extends Controller
{

    public function index()
    {
        $campaigns = Campaign::all();
        dd($campaigns);
    }
    
    public function create()
    {
        $locations = Location::all();
        $tenants = Tenant::all();
        return view('campaigns.create', [
            "locations" => $locations,
            "tenants" => $tenants
        ]);
    }
    
    public function store(StoreCampaignRequest $request)
    {
        $validatedRequest = $request->validated();
        $campaign = Campaign::create($validatedRequest);
        dd($campaign);
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
