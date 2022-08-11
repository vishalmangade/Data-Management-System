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

    <!-- jquery cdn  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- data table css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <!-- Update history filter -->
    <link rel="stylesheet" href="css/history_update_filter.css">
    <script src="js/history_update_filter.js"></script>

    <title>CRM Update History</title>
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
                include "includes/history_update_filter.php";
                ?>

            </div>
            <div class="col-sm-9">
                <h4 class="m-3">History : Update</h4>

                <!-- table start-->
                <table id="myTable" class="table table-striped table-bordered">

                    <!-- table head start -->
                    <thead>
                        <tr>
                            <th scope="col">Sr.No.</th>
                            <th scope="col">Industry</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Column Name</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Updated By</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                        </tr>
                    </thead>

                    <!-- table head end and table body start -->


                    <tbody id="result">
                        <?php
                        $sql = "SELECT * FROM `0_update_track`";
                        $result = mysqli_query($conn, $sql);
                        $sno = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['updated_by'];
                            $sql_name = "SELECT * FROM 0_emp_profile WHERE emp_id = '$id'";
                            $result_name = mysqli_query($conn, $sql_name);
                            $row_name = mysqli_fetch_assoc($result_name);
                            $sno = $sno + 1;
                            echo "<tr>
            <th scope='row'>" . $sno . "</th>
            <td>" . $row['industry'] . "</td>
            <td>" . $row['company_name'] . "</td>
            <td>" . $row['column_name'] . "</td>
            <td>" . $row['from'] . "</td>
            <td>" . $row['to'] . "</td>
            <td>" . $row_name['name'] . "</td>
            <td>" . $row['date'] . "</td>
            <td>" . $row['time'] . "</td>
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