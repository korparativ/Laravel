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

        @if ($values['email'] == '')
            <h1 style="color: red">Адрес электронной почты не указан</h1>
        @else
            <h2>Contacts information</h2>
            <table border="2">
                <tr>
                    <td>Address: </td>
                    <td>{{ $values['address'] }}</td>
                </tr>
                <tr>
                    <td>Post code: </td>
                    <td>{{ $values['post_code'] }}</td>
                </tr>
                <tr>
                    <td>E-mail: </td>
                    <td>{{ $values['email'] }}</td>
                </tr>
                <tr>
                    <td>Phone: </td>
                    <td>{{ $values['phone'] }}</td>
                </tr>
            </table>
        @endif

    @stop

</body>

</html>
