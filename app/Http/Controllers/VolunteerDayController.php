<?php

namespace App\Http\Controllers;

use App\Models\VolunteerDay;
use Illuminate\Http\Request;

class VolunteerDayController extends Controller
{
    public function index()
    {
        $volunteerDays = VolunteerDay::all();
        dd($volunteerDays);
    }

    public function store ()
    {

    }
}
