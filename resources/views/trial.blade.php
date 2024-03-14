<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('trial') }} " method="POST">
        <input type="date" name="date">
        <input type="date" name="start_time">
        <input type="time" name="end_time">
        <input type="submit" value="submit">
    </form>
</body>
</html>