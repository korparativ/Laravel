<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>Hello, {{ $name }}!!!</h2>
    <table border="2">
        <tr>
            <td>User name: </td>
            <td>{{ $name }}</td>
        </tr>
        <tr>
            <td>Last name: </td>
            <td>{{ $last_name }}</td>
        </tr>
        <tr>
            <td>E-mail: </td>
            <td>{{ $email }}</td>
        </tr>

    </table>
</body>

</html>
