<?php
require_once __DIR__ . '/../../header.php';
require_once __DIR__ . '/../../navigation.php';
require_once __DIR__ . '/../../main.php';
?>

<div class="row mt-5">
    <div class="col-12">
        <h1>List of students</h1>
    </div>
</div>
<div class="row mt-5">
    <div class="col-12">
        <?php if(count($students) > 0) {
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Birth_day</th>
                    <th>Grade</th>
                    <th>ClassId</th>
                    <th>UserId</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($students as $student) {
                    echo "<tr>";
                    echo "<td>" . $student['firstName'] . "</td>";
                    echo "<td>" . $student['lastName'] . "</td>";
                    echo "<td>" . $student['birth_day'] . "</td>";
                    echo "<td>" . $student['grade'] . "</td>";
                    echo "<td>" . $student['class_id'] . "</td>";
                    echo "<td>" . $student['user_id'] . "</td>";
                    echo "<td><a href='/students/delete/id/". $student['student_id']."'>Delete</a></td>";
                    echo "<td><a href='/students/update/id/". $student['student_id']."' class='ml-2'>Update</a></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
            <?php
        } else {
            ?>
            No student found!
        <?php } ?>
    </div>
</div>


<?php
require_once __DIR__ . '/../../footer.php';
?>
