<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Setup campaign - {{ $campaign->name }}</h1>
       <form action="{{ route('campaign.days.store', ['campaign_id'=>$campaign->id]) }}" method="POST">
        <input type="date"name="date" placeholder="Date"> <br>
        <input type="text" name="start_time" placeholder="Start time"> <br>
        <input type="text" name="end_time" placeholder="End time"> <br>
        <input type="submit" value="Submit">
    </form> 

   @if ($campaignDays)
       @foreach ($campaignDays as $campaignDay)
           <div>{{ $campaignDay->date }}</div>
       @endforeach
   @endif
    
</body>
</html>