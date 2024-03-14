<?php

namespace App\Http\Controllers;

use App\Models\CampaignDay;
use Illuminate\Http\Request;

class CampaignDayController extends Controller
{
    public function index()
    {
        $campaignDays = CampaignDay::all();
        dd($campaignDays); 
    }

    public function store ()
    {
        
    }
}
