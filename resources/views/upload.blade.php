<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File upload</title>
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <form name="add-new-book" id="add-new-book" method="POST" enctype="multipart/form-data"
                    action="{{ route('upload_file') }}">
                    @csrf
                    <div class="form-group">
                        <label for="book_name">Name</label>
                        <input type="text" id="file_name" name="file_name" class="form-control" required="">
                        <input type="file" name="uploaded_file">
                        <button class="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
