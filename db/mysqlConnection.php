<?php
$mysqli = new mysqli(
    'localhost',
    'root',
    '',
    'project_module2'
);
// check connection
if ($mysqli->connect_errno) {
    echo 'Failed to connect to MySQL: ' . $mysqli->connect_error;
    exit;
}

