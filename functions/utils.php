<?php

function getFunctionName(): string
{
    $functionName = "read";
    $method = $_SERVER['REQUEST_METHOD'];
    $idExistInGet = isset($_GET['id']);

    if($method == "POST"){
        if($idExistInGet) {
            $functionName = "update";
        } else {
            $functionName = "create";
        }
        if(isset($_GET['login'])) {
            $functionName = "checkUserData";
        }
    } else {
        if($idExistInGet) {
            $functionName = "delete";
        }
        if(isset($_GET['create'])) {
            $functionName = "showCreateForm";
        }
        if(isset($_GET['admin'])) {
            $functionName = "showAdminPage";
        }
        if(isset($_GET['update'])) {
            $functionName = "showUpdateForm";
        }
        if(isset($_GET['login'])) {
            $functionName = "showLoginPage";
        }
        if(isset($_GET['logout'])) {
            $functionName = "logoutAndRedirect";
        }
        if(isset($_GET['report'])) {
            $functionName = "studentsByClassroom";
        }
    }

    return $functionName;

}

function getUserIdByEmail($userEmail): int {
    global $mysqli;
    $sqlUserId = sprintf("SELECT user_id FROM users WHERE email = '%s'", $userEmail);
    $result = $mysqli->query($sqlUserId);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if(is_array($row)) {
        $userId = $row['user_id'];

    } else {
        throw new Exception("User does not exist!");
    }

    return (int) $userId;
}

function getClassIdByClassName($className): int {
    global $mysqli;
    $sqlClassId = sprintf("SELECT class_id FROM classrooms WHERE class_name = '%s'", $className);
    $result = $mysqli->query($sqlClassId);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if(is_array($row)) {
        $classId = $row['class_id'];

    } else {
        throw new Exception("Class does not exist!");
    }

    return (int) $classId;

}

function getUserEmailById($id): string|bool
{
    global $mysqli;
    $sqlUserId = sprintf("SELECT email FROM users WHERE user_id = '%d'", $id);
    $result = $mysqli->query($sqlUserId);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if (is_array($row)) {
        $email = $row['email'];

    } else {
        throw new Exception("User does not exist!");
    }

    return (int)$email;

}

function getClassNameById($id): string|bool {
    global $mysqli;
    $sqlClassName = sprintf("SELECT class_name FROM classrooms WHERE class_id = '%d'", $id);
    $result = $mysqli->query($sqlClassName);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if(is_array($row)) {
        $className = $row['class_name'];

    } else {
        throw new Exception("Class does not exist!");
    }

    return (int) $className;

}

function redirectIfUserNotLoggedIn(): void {
    session_start();

    if(!$_SESSION['user'] || !is_array($_SESSION['user'])) {
        echo '<meta http-equiv="refresh" content="1; url=\'/login\'"/>';
        exit;
    }

}


