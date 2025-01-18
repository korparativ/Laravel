<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User registration</title>
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center font-weight-bolt">
                <h2>User form</h2>
            </div>
            <div class="card-body">
                <form name="add-blog-post-form" id="add-blog-post form" method="POST" action="{{ url('store_form') }}">
                    @csrf
                    <div class="form-group">
                        <label for="username">Name:</label>
                        <input type="text" placeholder="Name" id="username" name="username" class="form-control"
                            required=""><br><br>
                        <label for="last_name">Last name:</label>
                        <input type="text" placeholder="Last name" id="last_name" name="last_name"
                            class="form-control" required=""><br><br>
                        <label for="email">E-mail:</label>
                        <input type="text" placeholder="E-mail" id="email" name="email" class="form-control"
                            required=""><br><br>
                    </div>
                    <button class="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
