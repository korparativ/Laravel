<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
</head>

<body>
    @extends('layouts.default')

    @section('content')

        @if ($users['age'] < 18)
            <h1 style="color: red">Вы слишком молоды</h1>
        @else
            <h2>User information</h2>
            <table border="2">
                <tr>
                    <td>Name: </td>
                    <td>{{ $users['name'] }}</td>
                </tr>
                <tr>
                    <td>Age: </td>
                    <td>{{ $users['age'] }}</td>
                </tr>
                <tr>
                    <td>Position: </td>
                    <td>{{ $users['position'] }}</td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td>{{ $users['address'] }}</td>
                </tr>
            </table>
        @endif

    @stop

</body>

</html>
