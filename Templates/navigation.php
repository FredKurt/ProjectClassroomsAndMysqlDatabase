<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                <?php if(isset($_SESSION['user']) && is_array($_SESSION['user'])) {?>
                <a class="nav-link" href="/logout">Logout</a>
                <?php } else { ?>
                <a class="nav-link" href="/login">Login</a>
                <?php } ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin">Administration</a>
            </li>
        </ul>
</nav>
