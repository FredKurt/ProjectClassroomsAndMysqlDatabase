<?php
redirectIfUserNotLoggedIn();
$function = getFunctionName();

try {
    $function();
}catch (Exception $e) {
    echo $e->getMessage();
    die;
}

function studentsByClassroom(): void {
    global $mysqli;
    $sql = "SELECT classrooms.class_name, students.firstName, students.lastName
          FROM classrooms
          LEFT JOIN students ON classrooms.class_id = students.class_id
          ORDER BY classrooms.class_name, students.firstName, students.lastName";
    $result = $mysqli->query($sql);

    require_once __DIR__ . '/../templates/pages/report/students_by_classroom.php';

}