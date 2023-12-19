<?php
require_once __DIR__ . '/../../header.php';
require_once __DIR__ . '/../../navigation.php';
require_once __DIR__ . '/../../main.php';
?>

<div class="row mt-5">
    <div class="col-12">
        <h1>Create a student</h1>
    </div>
</div>
<div class="row mt-5">
    <div class="col-12">
        <form action="/students" method="post">
            <div class="form-group row mb-3">
                <label for="firstName" class="col-sm-2 col-form-label">FirstName</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="firstName" id="firstName">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="lastName" class="col-sm-2 col-form-label">LastName</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="lastName" id="lastName">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="birth_day" class="col-sm-2 col-form-label">Birth_Day</label>
                <div class="col-sm-10">
                    <input type="date" name="birth_day" class="form-control" id="birth_day">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="grade" class="col-sm-2 col-form-label">Grade</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="grade" id="grade">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="class_name" class="col-sm-2 col-form-label">Class_name</label>
                <div class="col-sm-10">
                    <select name="class_name" id="class_name" class="form-control">
                        <option value="0">Please select classroom</option>
                        <?php foreach($classrooms as $classroom) { ?>
                            <option value="<?=$classroom['class_id']?>"><?=$classroom['class_name']?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="userEmail" class="col-sm-2 col-form-label">UserEmail</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="userEmail" id="userEmail">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-5" name="student-create">Create</button>
        </form>
    </div>
</div>

<?php
require_once __DIR__ . '/../../footer.php';
?>
