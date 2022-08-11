<?php
session_start();
session_regenerate_id();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true) {
    header("Location: ../dashboard/php/logout.php");
}

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">DMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php

                if($_SESSION['title'] == "administrator")
                echo '<li class="nav-item">
                        <a class="nav-link" href="dashboard">Dashboard</a>
                </li>'

                ?>
                
            </ul>
            <form class="d-flex">
            <a class="nav-link active link-danger" aria-current="page" href="dashboard/php/logout.php">Logout</a>
            </form>
        </div>
    </div>
</nav>