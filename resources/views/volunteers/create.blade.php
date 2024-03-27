@extends('layouts.app')
@section('title', 'Volunteer Registration Form')
@section('content')

    <h3>Add volunteer</h3>
    <form action="{{ route('register.campaign.store') }}" method="POST">
        <input type="text" name="name" placeholder="name"> <br>
        <input type="text" name="organization" placeholder="organization"> <br>
        <input type="text" name="phone" placeholder="phone"> <br><br>

        <select name="service_area_id" id="">
            <option value="">Service Area</option>
            @foreach ($serviceAreas as $serviceArea)
                <option value="{{ $serviceArea->id }}">{{ $serviceArea->name }}</option>
            @endforeach
        </select>
        
        @foreach ($campaignDays as $campaignDay)
            <div>
                <label>{{ \Carbon\Carbon::parse($campaignDay->date)->format('F j') }}</label>  {{-- 'js F Y' --}}
                <input type="checkbox" name="days[]" value="{{ $campaignDay->id }}">
                
                <!-- Select dropdown for start time -->
                <select name="start_time[]">
                    @php
                        $startTimeOptions = range($campaignDay->start_time, $campaignDay->end_time - 1);
                    @endphp
                    @foreach ($startTimeOptions as $startTime)
                        <option value="{{ $startTime }}">{{ $startTime }}</option>
                    @endforeach
                </select>
                
                <!-- Select dropdown for end time -->
                <select name="end_time[]">
                    @php
                        $endTimeOptions = range($campaignDay->start_time + 1, $campaignDay->end_time);
                    @endphp
                    @foreach ($endTimeOptions as $endTime)
                        <option value="{{ $endTime }}">{{ $endTime }}</option>
                    @endforeach
                </select>
            </div>
        @endforeach
        
        <br>
        <input type="submit" value="Submit">
    </form>


@endsection
