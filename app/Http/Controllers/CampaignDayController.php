<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCampaignDayRequest;
use App\Http\Resources\CampaignDayResource;
use App\Models\Campaign;
use App\Models\CampaignDay;
use Illuminate\Http\Request;

class CampaignDayController extends Controller
{
    public function index(string $id)
    {
        $campaignDays = CampaignDay::all()->where('campaign_id', '==', $id);
        return $campaignDays;
    }


    public function create (string $campaign_id)
    {
        $campaign = Campaign::find($campaign_id);
        $campaignDays = CampaignDay::all()->where('campaign_id', '==', $campaign_id);
        return view('campaigns.schedule', 
        [
            'campaign'=> $campaign, 
            'campaignDays' => $campaignDays
        ]);
    }


    public function store (Request $request, string $campaign_id)
    {
        // $data = $request->validated();
        $request["campaign_id"] = $campaign_id;
        CampaignDay::create($request->all());
        return back();
    }
}
