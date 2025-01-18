<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books list</title>
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
            <table>
            @foreach ($books as $key => $book)
            <tr>
                <td>{{ $book }}</td>
                <td><a href="{{ route('remove_book', $key) }}">Remove</a></td>
            </tr>
            @endforeach
            </table>
                <form name="add-new-book" id="add-new-book" method="POST" action="{{ route('save_book') }}">
                    @csrf
                    <div class="form-group">
                        <label for="book_name">Name</label>
                        <input type="text" id="book_name" name="book_name" class="form-control" required="">
                    <button class="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
