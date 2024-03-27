<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  
    <div class="container">
        <h3>All Campaigns</h3>
        <table>
            <thead>
                <tr>
                    <th>Campaign</th>
                    <th>Tenant</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($campaigns as $campaign)
                    <tr>
                        <td>{{ $campaign->name }}</td>
                        <td>{{ $campaign->tenant->name }}</td>
                        <td>{{ $campaign->location->name }}</td>
                        <td>
                            <span><a href="#">Delete</a></span>
                            <span><a href="{{ route('campaign.days.create', ['campaign_id' => $campaign->id]) }}">Schedule</a></span>
                            <span><a href="{{ route('campaign.volunteers.create', ['campaign' => $campaign->id]) }}">
                                Register Attendance</a>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>