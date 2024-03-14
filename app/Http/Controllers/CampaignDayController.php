<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\CampaignDay;
use Illuminate\Http\Request;

class CampaignDayController extends Controller
{
    public function index()
    {
        $campaignDays = CampaignDay::all();
        dd($campaignDays); 
    }

    public function create ()
    {
        $campaigns = Campaign::all();
        return view('campaigns.schedule', []);
    }

    public function store ()
    {
        
    }
}
