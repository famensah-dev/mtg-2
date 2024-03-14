<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVolunteerRequest;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index ()
    {
        $volunteers = Volunteer::all();
        dd($volunteers);
    }

    public function store (StoreVolunteerRequest $request)
    {
        $validatedRequest = $request->validated();
        $volunteer = Volunteer::create($validatedRequest);
        dd($volunteer);
    }
}
