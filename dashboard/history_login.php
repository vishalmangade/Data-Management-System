<?php
session_start();
session_regenerate_id();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true && $_SESSION['title'] != "administrator") {
    header("Location: php/logout.php");
}

?><?php include "php/dbconnect.php"; ?>
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

    <!-- jquery cdn  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- data table css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <!-- Update history filter -->
    <link rel="stylesheet" href="css/history_login_filter.css">
    <script src="js/history_login_filter.js"></script>

    <title>CRM Login History</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            include "includes/header.php";
            ?>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <?php
                include "includes/history_login_filter.php";
                ?>

            </div>
            <div class="col-sm-9">
                <h4 class="m-3">History : Login</h4>

                <!-- table start-->
                <table id="myTable" class="table table-striped table-bordered">

                    <!-- table head start -->
                    <thead>
                        <tr>
                            <th scope="col">Sr.No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">status</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End Date</th>
                            <th scope="col">End Time</th>
                        </tr>
                    </thead>

                    <!-- table head end and table body start -->


                    <tbody id="result">
                        <?php
                        $sql = "SELECT * FROM `0_login_track`";
                        $result = mysqli_query($conn, $sql);
                        $sno = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sql_name = "SELECT * FROM 0_emp_profile WHERE emp_id = " . $row['emp_id'];
                            $result_name = mysqli_query($conn, $sql_name);
                            $row_name = mysqli_fetch_assoc($result_name);
                            $status = "";
                            if ($row['status'] == 1) {
                                $status = "<td style='background-color:#8AFF81;'>Acive</td>";
                            } else {
                                $status = "<td style='background-color:#FC6565;'>Deacive</td>";
                            }
                            $sno = $sno + 1;
                            echo "<tr>
            <th scope='row'>" . $sno . "</th>
            <td>" . $row_name['name'] . "</td>
            "      . $status . "
            <td>" . $row['start_date'] . "</td>
            <td>" . $row['start_time'] . "</td>
            <td>" . $row['end_date'] . "</td>
            <td>" . $row['end_time'] . "</td>
        </tr>";
                        }
                        ?>
                    </tbody>
                    <!-- table body end -->
                </table>
            </div>
        </div>
    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    <!-- jquery cdn  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

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