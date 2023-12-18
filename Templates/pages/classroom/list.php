<?php
require_once __DIR__ . '/../../header.php';
require_once __DIR__ . '/../../navigation.php';
require_once __DIR__ . '/../../main.php';
?>

<div class="row mt-5">
    <div class="col-12">
        <h1>List of classrooms</h1>
    </div>
</div>
<div class="row mt-5">
    <div class="col-12">
        <?php
        if(count($classrooms) > 0) {
        ?>
        <table class="table">
           <thead>
           <tr>
               <th>Class_name</th>
               <th>Room_number</th>
               <th>Capacity</th>
               <th>UserId</th>
               <th>Actions</th>
           </tr>
           </thead>
            <tbody>
            <?php
            foreach ($classrooms as $classroom) {
                echo "<tr>";
                echo "<td>" . $classroom['class_name'] . "</td>";
                echo "<td>" . $classroom['room_number'] . "</td>";
                echo "<td>" . $classroom['capacity'] . "</td>";
                echo "<td>" . $classroom['user_id'] . "</td>";
                echo "<td><a href='/controllers/classrooms.php?id=". $classroom['class_id']."'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
        <?php
        } else {
        ?>
        No classroom found!
        <?php } ?>
    </div>
</div>


<?php
require_once __DIR__ . '/../../footer.php';
?>