<html>

<body>
    <form method="post" action="{{ Route('book_store') }}">
        @csrf
        <div class="form-section">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div><br>
        <div class="form-section">
            <label for="author">Author</label>
            <input type="text" id="author" name="author" class="form-control" required>
        </div><br>
        <div class="form-section">
            <label for="genre">Choose Genre: </label>
            <select name="genre" id="genre">
                <option value="fantasy">Fantasy</option>
                <option value="sci-fi">Sci-Fi</option>
                <option value="mystery">Mystery</option>
                <option value="drama">Drama</option>
            </select><br>
            <button type="submit">Submit</button>
        </div>
    </form>
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
</body>

</html>
