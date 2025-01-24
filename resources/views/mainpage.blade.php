<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main page</title>
</head>
<body>
    <x-header text='Main'>
        <x-slot name='shape'>
            <div style="background-color: red; width: 50px; height: 50px; display: block;"></div>
        </x-slot>
        <x-slot name='line'>
            <p>TEXT</p>
        </x-slot>
    </x-header>
</body>
</html>
