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
        <form method="POST" action="{{ route('campaigns.store' )}}">
            @csrf
            <input type="text" name="name"> <br>
            <select name="tenant_id" id="">
                <option value="">Select Tenant</option>
                @foreach ($tenants as $tenant)
                    <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                @endforeach
            </select> <br>
            <select name="location_id" id="">
                <option value="">Select Location</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select> <br>
            <input type="date" name="start_date"> <br>
            <input type="date" name="end_date"> <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>