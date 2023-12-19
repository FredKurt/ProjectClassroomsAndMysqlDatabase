<?php
require_once __DIR__ . '/../../header.php';
require_once __DIR__ . '/../../navigation.php';
require_once __DIR__ . '/../../main.php';
?>

<div class="row mt-5">
    <div class="col-12">
        <h1>Login Page></h1>
    </div>
</div>
<div class="row mt-5">
    <div class="col-12">
        <form method="post" action="" class="mt-5">
            <div class="form-group row mb-4">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-5" name="login-page">Login</button>
        </form>
    </div>
</div>


<?php require_once __DIR__ . '/../../footer.php';?>

