<?php
require_once __DIR__ . '/../../header.php';
require_once __DIR__ . '/../../navigation.php';
require_once __DIR__ . '/../../main.php';
?>

<div class="row mt-5">
    <div class="col-12">
        <h1>Students by classroom</h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <?php
        $currentClassroom = null;
        while ($row = mysqli_fetch_assoc($result)) {
            $classroom = $row['class_name'];
            $student = $row['firstName'] .''. $row['lastName'];

            if ($classroom !== $currentClassroom) {
                echo "<p>$classroom</p>";
                $currentClassroom = $classroom;
            }

            echo "<p>$student</p>";
        }
        ?>
    </div>
</div>

<?php
require_once __DIR__ . '/../../footer.php';
?>
