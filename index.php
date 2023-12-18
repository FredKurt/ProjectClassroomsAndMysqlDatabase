<?php

require_once __DIR__ . '/db/mysqlConnection.php';
require_once __DIR__ . '/functions/utils.php';


$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

//Routing

/*
 * Classrooms
 * Create: METHOD POST + URI '/controllers/classrooms.php';
 * Read: METHOD GET + URI '/controllers/classrooms.php';
 * Update: METHOD POST + URI '/controllers/classrooms.php?id=%id%';
 * Delete: METHOD GET + URI '/controllers/classrooms.php?id=%id%;
 *
 * Students
 * Create: METHOD POST + URI '/controllers/students.php';
 * Read: METHOD GET + URI '/controllers/students.php';
 * Update: METHOD POST + URI '/controllers/students.php?id=%id%';
 * Delete: METHOD GET + URI '/controllers/students.php?id=%id%;
 */

$get = '';
if(str_contains(strtolower($url), 'delete') || str_contains(strtolower($url), 'update'))
{
    $urlParams = explode('/', $url);
    $get = $urlParams[4] ?? '';
    $_GET['id'] = $get;
    $url = '/' . $urlParams[1] . '/' . $urlParams[2] . '/' . $urlParams[3];
}

$routing = match($url) {

    '/classrooms', '/classrooms/delete/id' => ['file' => __DIR__ . '/controllers/classrooms.php', 'get' => ''],
    '/classrooms/update/id' => ['file' => __DIR__ . '/controllers/classrooms.php', 'get' => 'update'],
    '/classrooms/create' => ['file' => __DIR__ . '/controllers/classrooms.php', 'get' => 'create'],
    '/students', '/students/delete/id' => ['file' => __DIR__ . '/controllers/students.php', 'get' => ''],
    '/students/update/id' => ['file' => __DIR__ . '/controllers/students.php', 'get' => 'update'],
    '/students/create' => ['file' => __DIR__ . '/controllers/students.php', 'get' => 'create'],
    '/report' => ['file' => __DIR__ . '/controllers/report.php', 'get' => 'report'],
    '/users' => ['file' => __DIR__ . '/controllers/users.php', 'get' => ''],
    '/login' => ['file' => __DIR__ . '/controllers/users.php', 'get' => 'login'],
    '/logout' => ['file' => __DIR__ . '/controllers/users.php', 'get' => 'logout'],
    '/admin' => ['file' => __DIR__ . '/controllers/users.php', 'get' => 'admin'],
    default => ['file' => __DIR__ . '/Templates/pages/home.php', 'get' => ''],
};
$_GET[$routing['get']] = $routing['get'];
require_once $routing['file'];
require_once __DIR__ . '/db/mysql_close.php';