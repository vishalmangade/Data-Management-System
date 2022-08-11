<?php
session_start();
session_regenerate_id();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true && $_SESSION['title'] != "administrator") {
    header("Location: php/logout.php");
}

?>
<?php include "php/dbconnect.php"; ?>
<?php
if (isset($_POST['action'])) {
    date_default_timezone_set("Asia/Kolkata");
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $session = $_SESSION['session_id'];
    $sql = "UPDATE `0_login_track` SET `end_date` = '$date' , `end_time` = '$time' WHERE `session_id` = '$session'";
    $result = mysqli_query($conn, $sql);
    if ($result) echo 1;
    else echo mysqli_error($conn);
    die();
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

    <title>CRM Dashboard</title>
</head>

<body>
    <?php
    include "includes/header.php";
    ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            //  logout time update 
            setInterval(function() {
                action = "action";
                $.ajax({
                    method: "POST",
                    data: {
                        action: action
                    }
                })
            }, 1000);

        });
    </script>
</body>

</html>