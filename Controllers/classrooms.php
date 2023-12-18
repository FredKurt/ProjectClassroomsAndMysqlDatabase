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

    require_once __DIR__ . '/../templates/pages/classroom/create.php';
}


function create(): void
{
    global $mysqli;
    $class_name = filter_input(INPUT_POST, "class_name");
    $room_number = filter_input(INPUT_POST, "room_number");
    $capacity = filter_input(INPUT_POST, "capacity");
    $userEmail = filter_input(INPUT_POST, "userEmail" );

    $userId = getUserIdByEmail($userEmail);


    $sql = sprintf("INSERT INTO classrooms (class_id, class_name, room_number, capacity, user_id) 
                          VALUES (NULL, '%s', '%s', '%d', '%d')", $class_name, $room_number, $capacity, $userId);
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();

    echo '<meta http-equiv="refresh" content="1; url=\'/classrooms\'"/>';

}

function read():void {
    global $mysqli;
    $sql = "SELECT * FROM classrooms";
    $result = $mysqli->query($sql);
    $classrooms = $result->fetch_all(MYSQLI_ASSOC);
    require_once __DIR__ . '/../templates/pages/classroom/list.php';

}

function update(): void {
    global $mysqli;
    $class_name = filter_input(INPUT_POST, "class_name");
    $room_number = filter_input(INPUT_POST, "room_number");
    $capacity = filter_input(INPUT_POST, "capacity");
    $userEmail = filter_input(INPUT_POST, "userEmail" );

    $userId = getUserIdByEmail($userEmail);

    $sql = sprintf("UPDATE classrooms (class_name, room_number, capacity, user_id) VALUES ('%s', '%s', '%d', '%d')", $class_name, $room_number, $capacity, $userId);
    $stmt = $mysqli->prepare($sql);
    $stmt->excute();


}

function delete(): void {
    global $mysqli;
    $classId = filter_input(INPUT_GET, 'id');
    $sql = sprintf("DELETE FROM classrooms WHERE class_id=%d", (int)$classId);
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();

    echo '<meta http-equiv="refresh" content="1; url=\'/classrooms\'"/>';

}
