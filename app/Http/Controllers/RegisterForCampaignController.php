<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterForCampaignRequest;
use App\Models\Campaign;
use App\Models\CampaignDay;
use App\Models\ServiceArea;
use App\Models\Volunteer;
use App\Models\VolunteerDay;
use Illuminate\Http\Request;

class RegisterForCampaignController extends Controller
{
    public function create ($campaign_id=1)
    {
        $campaign = Campaign::find($campaign_id);
        // $campaignDays = CampaignDay::all()->where('campaign_id', '==', $campaign_id);
        $campaignDays = CampaignDay::where('campaign_id', $campaign_id)->get()->sortBy('date');
        $serviceAreas = ServiceArea::all();
        return view('volunteers.create')->with(  
        [
            'campaign'=> $campaign, 
            'campaignDays' => $campaignDays,
            'serviceAreas' => $serviceAreas        
        ]);
    }

    public function store(RegisterForCampaignRequest $request)
    {
    // Retrieve data from the request
    $name = $request->name;
    $organization = $request->organization;
    $phone = $request->phone;
    $serviceArea = $request->service_area_id;
    $daysSelected = $request->input('days', []); // Get days selected as an array
    $startTimes = $request->input('start_time', []);
    $endTimes = $request->input('end_time', []);

    // Remove null values from startTimes and endTimes
    $startTimesSelected = array_values(array_filter($startTimes));
    $endTimesSelected = array_values(array_filter($endTimes));

    // Validate data lengths
    if (count($daysSelected) !== count($startTimesSelected) || count($daysSelected) !== count($endTimesSelected)) {
        return response()->json(['error' => 'Invalid input data'], 400);
    }

    // Create a new volunteer
    $volunteer = Volunteer::create([
        'name' => $name,
        'organization' => $organization,
        'phone' => $phone
    ]);

    // Prepare data for VolunteerDay creation
    $dataToInsert = [];
    for ($i = 0; $i < count($daysSelected); $i++) {
        $dataToInsert[] = [
            'volunteer_id' => $volunteer->id,
            'campaign_day_id' => $daysSelected[$i],
            'service_area_id' => $serviceArea,
            'start_time' => $startTimesSelected[$i],
            'end_time' => $endTimesSelected[$i]
        ];
    }

    // Insert data into VolunteerDay table
    try {
        VolunteerDay::insert($dataToInsert);
    } catch (\Exception $e) {
        // Handle database insertion error
        return response()->json(['error' => 'Failed to insert data into VolunteerDay table'], 500);
    }

    // Return a success response
    return response()->json(['message' => 'Data inserted successfully']);
}

}
