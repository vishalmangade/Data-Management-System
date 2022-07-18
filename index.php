<?php
include "dashboard/php/dbconnect.php";

$msg = -1;

if (isset($_POST['permit'])) {

    $userkey = mysqli_real_escape_string($conn, $_POST['userkey']);
    $keyword = mysqli_real_escape_string($conn, $_POST['keyword']);

    $sql = "SELECT * FROM 0_emp_profile WHERE email = '$userkey'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $status = $row['status'];
            $emp_id = $row['emp_id'];
            date_default_timezone_set("Asia/Kolkata");
            $date = date("Y-m-d");
            $time = date("H:i:s");
            $sql_login = "INSERT INTO `0_login_track` (`emp_id`,`status`,`start_date`,`start_time`,`end_date`,`end_time`) VALUES ('$emp_id','$status','$date','$time','$date','$time')";
            $result_login = mysqli_query($conn, $sql_login);
            $session_id =  mysqli_insert_id($conn);
            if ($status == 0) {
                $msg = 2;
            } else {
                $success = password_verify($keyword, $row['keyword']);
                if ($success == 1) {
                    session_start();
                    session_regenerate_id();
                    $_SESSION['isLogin'] = true;
                    $_SESSION['title'] = $row['title'];
                    $_SESSION['status'] = $row['status'];
                    $_SESSION['emp_id'] = $row['emp_id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['session_id'] = $session_id;
                    if ($_SESSION['title'] == "analyst") {
                        header("location:analyst");
                    } else if ($_SESSION['title'] == "administrator") {
                        header("location:admin");
                    }
                } else {
                    $msg = 4;
                }
            }
        }
    } else {
        $msg = 1;
    }
}
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- jquery cdn  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <title>User Login</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-sm">

            </div>
            <div class="col-sm">
                <form autocomplete="off" method="POST">
                    <div class="mb-3">
                        <label for="userkey" class="form-label">User Id</label>
                        <input type="text" class="form-control" name="userkey" required>

                    </div>
                    <div class="mb-3">
                        <label for="keyword" class="form-label">Password</label>
                        <input type="password" class="form-control" name="keyword" required>
                    </div>
                    <button id="askpermit" name="permit" class="btn btn-primary">Login</button>
                    <?php
                    if ($msg == 1 || $msg == 4)
                        echo '<div class="form-text text-danger">Invalid Credentials.</div>';
                    else if ($msg == 2)
                        echo '<div class="form-text text-danger">Your profile is deactive.<br>Please contact administrator.</div>';
                    ?>
                </form>

            </div>
            <div class="col-sm">

            </div>
        </div>
    </div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    <!-- jquery cdn  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>