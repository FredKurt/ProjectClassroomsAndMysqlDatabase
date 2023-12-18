<?php
redirectIfUserNotLoggedIn();

$function = getFunctionName();
try {
    $function();
}catch (Exception $e) {
    echo $e->getMessage();
    die;

}

function showCreateForm(): void {
    global $mysqli;
    $sql = "SELECT * FROM classrooms";
    $result = $mysqli->query($sql);
    $classrooms = $result->fetch_all(MYSQLI_ASSOC);
    require_once __DIR__ . '/../templates/pages/student/create.php';
}

function showUpdateForm(): void {
    global $mysqli;
    $id = htmlspecialchars($_GET['id']);
    $sql = sprintf("SELECT * FROM students WHERE student_id=%d", $id);
    $result = $mysqli->query($sql);
    $student = $result->fetch_array(MYSQLI_ASSOC);

    if($student === false) {
        throw new Exception('classroom' . $id . 'not found!' );
    }
    $student['email'] = getUserEmailById($student['user_id']);
    $student['class_name'] = getClassNameById($student['class_id']);

    $sql = "SELECT * FROM classrooms";
    $result = $mysqli->query($sql);
    $classrooms = $result->fetch_all(MYSQLI_ASSOC);
    require_once __DIR__ . '/../templates/pages/student/update.php';
}
function create(): void {
    global $mysqli;
    $firstName = filter_input(INPUT_POST, "firstName");
    $lastName = filter_input(INPUT_POST, "lastName");
    $birth_day = filter_input(INPUT_POST, "birth_day");
    $grade = filter_input(INPUT_POST, "grade");
    $className = filter_input(INPUT_POST, "class_name");
    $userEmail = filter_input(INPUT_POST, "userEmail");

    $userId = getUserIdByEmail($userEmail);
    $classId = getClassIdByClassName($className);

    $sql = sprintf("INSERT INTO students (student_id, firstName, lastName, birth_day, grade, class_id, user_id) 
                           VALUES (NULL, '%s', '%s', '%s', '%d', '%d', '%d')", $firstName, $lastName, $birth_day, $grade, $classId, $userId);
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();

    echo '<meta http-equiv="refresh" content="1; url=\'/students\'"/>';
}

function read(): void {
    global $mysqli;
    $sql = "SELECT * FROM students";
    $result = $mysqli->query($sql);
    $students = $result->fetch_all(MYSQLI_ASSOC);
    require_once __DIR__ . '/../templates/pages/student/list.php';

}

function update(): void {
    global $mysqli;
    $firstName = filter_input(INPUT_POST, "firstName");
    $lastName = filter_input(INPUT_POST, "lastName");
    $birth_day = filter_input(INPUT_POST, "birth_day");
    $grade = filter_input(INPUT_POST, "grade");
    $className = filter_input(INPUT_POST, "class_name");
    $userEmail = filter_input(INPUT_POST, "userEmail");
    $studentId = htmlspecialchars($_GET['id']);
    $userId = getUserIdByEmail($userEmail);
    $classId = getClassIdByClassName($className);

    $sql = sprintf("UPDATE students SET firstName='%s', lastName='%s', birth_day='%s', grade='%d', class_id='%d', user_id='%d') 
                           WHERE student_id='%d'", $firstName, $lastName, $birth_day, $grade, $classId, $userId, $studentId);
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();

    echo '<meta http-equiv="refresh" content="1; url=\'/students\'"/>';



}

function delete(): void {
    global $mysqli;
    $studentId = filter_input(INPUT_GET, 'id');
    $sql = sprintf("DELETE FROM students WHERE student_id=%d", (int)$studentId);
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();

    echo '<meta http-equiv="refresh" content="1; url=\'/students\'"/>';

}

