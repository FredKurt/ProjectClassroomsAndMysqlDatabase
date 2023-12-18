<?php
require_once __DIR__ . '/../../header.php';
require_once __DIR__ . '/../../navigation.php';
require_once __DIR__ . '/../../main.php';
?>

<div class="row mt-5">
    <div class="col-12">
        <h1>Create a classroom</h1>
    </div>
</div>
<div class="row mt-5">
    <div class="col-12">
        <form action="/classrooms" method="post">
            <div class="form-group row mb-3">
                <label for="class_name" class="col-sm-2 col-form-label">Class_Name</label>
                <div class="col-sm-10">
                    <input type="text" name="class_name" class="form-control" id="class_ame">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="room_number" class="col-sm-2 col-form-label">Room_Number</label>
                <div class="col-sm-10">
                    <input type="text" name="room_number" class="form-control" id="room_number">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="capacity" class="col-sm-2 col-form-label">Capacity</label>
                <div class="col-sm-10">
                    <input type="number" name="capacity" class="form-control" id="capacity">
                </div>
            </div>
            <div class="form-group row">
                <label for="userEmail" class="col-sm-2 col-form-label">UserEmail</label>
                <div class="col-sm-10">
                    <input type="email" name="userEmail" class="form-control" id="userEmail">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-5" name="classroom-create">Create</button>
        </form>
    </div>
</div>

<?php
require_once __DIR__ . '/../../footer.php';
?>