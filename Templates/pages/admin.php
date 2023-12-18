<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../navigation.php';
require_once __DIR__ . '/../main.php';
?>

<div class="row mt-5">
    <div class="col-12 text-center">
        <h1>Administration Page</h1>
    </div>
</div>
<div class="row mt-5">
    <div class="col-12">
        <h2>Classrooms Administration</h2>
        <ul>
            <li>
                <a href="/classrooms">List of classrooms</a>
            </li>
            <li>
                <a href="/classrooms/create">Create a classroom</a>
            </li>
        </ul>
    </div>
</div>

<div class="row mt-5">
    <div class="col-12">
        <h2>Students Administration</h2>
        <ul>
            <li>
                <a href="/students">List of students</a>
            </li>
            <li>
                <a href="/students/create">Create a student</a>
            </li>
        </ul>
    </div>
</div>

<div class="row mt-5">
    <div class="col-12">
        <h2>Report Administration</h2>
        <ul>
            <li>
                <a href="/report">Report of studentsByClassroom</a>
            </li>

        </ul>
    </div>
</div>
<?php
require_once __DIR__ . '/../footer.php';
?>
