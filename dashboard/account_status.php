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

    <!-- employee filter -->
    <link rel="stylesheet" href="css/employee_profile.css">

    <title>Employee Account Status</title>
</head>

<body>
    <!-- alert start  -->
    <div class="alert  alert-dismissible fade show" role="alert" style="display: none;">
        <div class="content"></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <!-- alert end here  -->
    <div class="container-fluid">
        <div class="row">
            <?php
            include "includes/header.php";
            ?>
        </div>
        <div class="row">
            <div class="col-sm">
                <div>
                    <h4 class="m-3" style="display: inline-block;">Employee Profile Status </h4>
                </div>

                <!-- table start-->
                <table id="myTable" class="table table-striped table-bordered">

                    <!-- table head start -->
                    <thead>
                        <tr>
                            <th scope="col">Sr.No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <!-- table head end and table body start -->


                    <tbody id="result">
                        <?php
                        $sql = "SELECT * FROM `0_emp_profile` WHERE title = 'analyst'";
                        $result = mysqli_query($conn, $sql);
                        $sno = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sno = $sno + 1;
                            echo "<tr>
            <th scope='row'>" . $sno . "</th>
            <td>" . $row['name'] . "</td>";
                            if ($row['status'] == 0) {
                                echo   "<td style='background-color:#FC6565;'>Deactive</td>
                                      <td><button type='button' id='activate_emp' class='btn btn-outline-success btn-sm' data-id=" . $row['emp_id'] . ">Activate</button></td>";
                            } else if ($row['status'] == 1) {
                                echo   "<td style='background-color:#8AFF81'>Active</td>
                                      <td><button type='button' id='deactivate_emp' class='btn btn-outline-danger btn-sm' data-id=" . $row['emp_id'] . ">Deactivate</button></td>";
                            }
                            echo  "</tr>";
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


            // alert btn close reload
            $(document).on("click", ".btn-close", function(e) {
                location.reload();
            })


            $(document).on("click", "#deactivate_emp", function(e) {
                var deactivate_emp = "deactivate_emp";
                var emp_id = $(this).data("id");

                $.ajax({
                    url: "php/employee_profile_ajax.php",
                    method: "POST",
                    data: {
                        deactivate_emp: deactivate_emp,
                        emp_id: emp_id
                    },
                    success: function(data) {
                        console.log(data);
                        if (data ) {
                            location.reload();
                        } else {
                            $(".content").html("Something went wrong. Please contact technical team.");
                            $(".alert").addClass("alert-danger");
                            $("#add_employee-modal").hide();
                            $(".alert").show();
                        }
                    }
                });
            });

            $(document).on("click", "#activate_emp", function(e) {
                var activate_emp = "activate_emp";
                var emp_id = $(this).data("id");

                $.ajax({
                    url: "php/employee_profile_ajax.php",
                    method: "POST",
                    data: {
                        activate_emp: activate_emp,
                        emp_id: emp_id
                    },
                    success: function(data) {
                        console.log(data);
                        if (data ) {
                            location.reload();
                        } else {
                            $(".content").html("Something went wrong. Please contact technical team.");
                            $(".alert").addClass("alert-danger");
                            $("#add_employee-modal").hide();
                            $(".alert").show();
                        }
                    }
                });
            });

        });
    </script>
</body>

</html>