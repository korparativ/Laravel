<html>

<body>
    <form method="post" action="{{ Route('add_users') }}">
        @csrf
        <div class="form-section">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div><br>
        <div class="form-section">
            <label for="surname">Surname</label>
            <input type="text" id="surname" name="surname" class="form-control" required>
        </div><br>
        <div class="form-section">
            <label for="email">E-mail</label>
            <input type="text" id="email" name="email" class="form-control" required>
        </div><br>
        <button type="submit">Submit</button>
    </form>
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
</body>

</html>
