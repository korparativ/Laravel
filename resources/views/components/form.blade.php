<form name="employee-form" id="employee-form" method="POST" action="{{ url('store-form') }}">
    @csrf
    <div class="form-grop">
        <label for="name">Name</label>
        <input type="text" id="name" class="form-control" required="true">
    </div><br>
    <div class="form-grop">
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" class="form-control" required="true">
    </div><br>
    <div class="form-grop">
        <label for="address">Address</label>
        <input type="text" id="address" class="form-control" required="true">
    </div><br>
    <div class="form-grop">
        <label for="email">Description</label>
        <input type="text" id="email" class="form-control" required="true">
    </div><br>
    <div class="form-grop">
        <label for="workData">Work Data</label>
        <input type="text" id="workData" class="form-control" required="true">
    </div><br>
    <div class="form-grop">
        <label for="textarea">Text Json</label>
        <input type="text" id="textarea" class="form-control" required="true">
    </div><br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
