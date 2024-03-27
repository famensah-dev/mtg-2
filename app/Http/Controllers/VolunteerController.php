<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVolunteerRequest;
use App\Models\Campaign;
use App\Models\CampaignDay;
use App\Models\ServiceArea;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index ()
    {
        $volunteers = Volunteer::all();
        dd($volunteers);
    }


    public function create(string $campaign_id)
    {
        $campaign = Campaign::find($campaign_id);
        $campaignDays = CampaignDay::all()->where('campaign_id', '==', $campaign_id);
        return view('volunteers.create')->with(  
        [
            'campaign'=> $campaign, 
            'campaignDays' => $campaignDays
        ]);

        // return view('volunteers.create')->with(['campaignDays'=> $campaignDays]);

        // $campaignDays = CampaignDay::all();
        // $campaigns = Campaign::all();
        // $serviceAreas = ServiceArea::all();
        // return view('volunteers.create', [
        //     // 'campaignDays' => $campaignDays,
        //     'campaigns' => $campaigns,
        //     'serviceAreas' => $serviceAreas
        // ]);
        // // dd($campaignDays);
    }


    public function store (StoreVolunteerRequest $request)
    {
        // return response()->json($request);
        dd($request);
        // $validatedRequest = $request->validated();
        // $volunteer = Volunteer::create($validatedRequest);
        // return response()->json(['volunteer'=>$volunteer]);
    }
}
