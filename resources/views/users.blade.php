<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>List of Users Blade</h2>
    @php
    $greenUser = 1;
    @endphp
    <table border="2">
        @foreach ($users as $key=>$user)
            @if ($key === $greenUser)
            <tr>
                <td>{{ $key }}</td>
                <td style="background-color: greenyellow">{{ $user }}</td>
            </tr>
            @elseif ($key === 4)
            <tr>
                <td>{{ $key }}</td>
                <td><b>{{ $user }}</b></td>
            </tr>
            @else
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $user }}</td>
            </tr>
            @endif
        @endforeach

</body>
</html>
