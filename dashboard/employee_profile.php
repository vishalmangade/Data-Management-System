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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <!-- data table css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <!-- employee filter -->
    <link rel="stylesheet" href="css/employee_profile.css">
    <!-- <script src="js/employee_profile_filter.js"></script> -->

    <title>Employee Profile</title>
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
                    <h4 class="m-3" style="display: inline-block;">Employee Profile </h4>
                    <button style="float: right;" class="mt-3 btn btn-outline-success add_employee-btn">Add Employee</button>
                </div>

                <!-- table start-->
                <table id="myTable" class="table table-striped table-bordered">

                    <!-- table head start -->
                    <thead>
                        <tr>
                            <th scope="col">Sr.No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created On</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Update</th>
                            <th scope="col">Change Password</th>
                            <th scope="col">Delete Profile</th>
                        </tr>
                    </thead>

                    <!-- table head end and table body start -->


                    <tbody id="result">
                        <?php
                        $sql = "SELECT * FROM `0_emp_profile`";
                        $result = mysqli_query($conn, $sql);
                        $sno = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sno = $sno + 1;
                            echo "<tr>
            <th scope='row'>" . $sno . "</th>
            <td>" . $row['name'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['title'] . "</td>
            <td>" . $row['created_on'] . "</td>
            <td>" . $row['created_at'] . "</td>
            <td><button type='button' class='update_profile-btn btn btn-sm btn-success p-1' data-eid =  " . $row['emp_id'] . ">Update Profile</button></td>
            <td><button type='button' class='change_password-btn btn btn-sm btn-info p-1' data-eid =  " . $row['emp_id'] . ">Change Password</button></td>
            <td><button type='button' class='delete_profile-btn btn btn-sm btn-danger p-1' data-eid =  " . $row['emp_id'] . ">Delete Profile</button></td>
        </tr>";
                        }
                        ?>
                    </tbody>
                    <!-- table body end -->
                </table>
            </div>
        </div>

        <!-- Add Empoyee modal  -->
        <div id="add_employee-modal">
            <div id="add_employee-modal-form">
                <h4 class="text-center">Add Person</h4>
                <hr>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" minlength="8" class="form-control" id="password" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" minlength="8" class="form-control" id="confirm_password" autocomplete="off">
                    </div>
                    <input id="add_employee" value="Add Employee" class="btn btn-primary">
                </form>
                <div id="add_employee-close-btn">X</div>

            </div>
        </div>

        <!-- update modal  -->
        <div id="update_profile-modal">
            <div id="update_profile-modal-form">
                <h4 class="text-center">Update Profile</h4>
                <hr>

                <table id="update-form" cellpadding="2px" width="100%">

                </table>
                <div id="update_profile-close-btn">X</div>

            </div>
        </div>

        <!-- change password modal  -->
        <div id="change_password-modal">
            <div id="change_password-modal-form">
                <h4 class="text-center">Change Password</h4>
                <hr>
                <table id="change_password-form" cellpadding="2px" width="100%">

                </table>
                <div id="change_password-close-btn">X</div>

            </div>
        </div>




    </div>






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    <!-- jquery cdn  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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

            // add person 
            $(document).on("click", ".add_employee-btn", function(e) {
                $("#add_employee-modal").show();
            });

            // add person hide modal 
            $(document).on("click", "#add_employee-close-btn", function(e) {
                $("#add_employee-modal").hide();
            })

            // alert btn close reload
            $(document).on("click", ".btn-close", function(e) {
                location.reload();
            })


            $(document).on("click", "#add_employee", function(e) {
                var name = $("#name").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var confirm_password = $("#confirm_password").val();
                var add_employee = "add_employee";

                if (confirm_password != password) {
                    $(".content").html("Password and Confirm Password are not same.");
                    $(".alert").addClass("alert-warning")
                    $("#add_employee-modal").hide();
                    $(".alert").show();
                } else if (password.length < 8) {
                    $(".content").html("Password lenght should be greater than or equal to 8.");
                    $(".alert").addClass("alert-warning")
                    $("#add_employee-modal").hide();
                    $(".alert").show();
                } else {


                    $.ajax({
                        url: "php/employee_profile_ajax.php",
                        method: "POST",
                        data: {
                            add_employee: add_employee,
                            name: name,
                            email: email,
                            password: password
                        },
                        success: function(data) {
                            if (data === '2') {
                                $(".content").html("User with same Email Id alredy Exist.");
                                $(".alert").addClass("alert-danger");
                                $("#add_employee-modal").hide();
                                $(".alert").show();

                            } else if (data === '3') {
                                $(".content").html("Registration Susseccfull.");
                                $(".alert").addClass("alert-success");
                                $("#add_employee-modal").hide();
                                $(".alert").show();

                            } else {
                                $(".content").html("Something went wrong. Please contact technical team.");
                                // $(".content").html(data);
                                $(".alert").addClass("alert-danger");
                                $("#add_employee-modal").hide();
                                $(".alert").show();

                            }

                        }
                    });

                }
            });

            // update profile formfill

            $(document).on("click", ".update_profile-btn", function(e) {
                $("#update_profile-modal").show();
                var emp_id = $(this).data("eid");
                var update_formfill = "update_formfill";

                $.ajax({
                    url: "php/employee_profile_ajax.php",
                    method: "POST",
                    data: {
                        emp_id: emp_id,
                        update_formfill: update_formfill,
                    },
                    success: function(data) {
                        $("#update-form").html(data);
                    }
                })

            });

            // update close
            $(document).on("click", "#update_profile-close-btn", function(e) {
                $("#update_profile-modal").hide();
            })

            //  save updated data

            $(document).on("click", "#update_submit", function() {
                var emp_id = $("#emp-id").val();
                var name = $("#update-name").val();
                var email = $("#update-email").val();
                var update = "update";

                $.ajax({
                    url: "php/employee_profile_ajax.php",
                    method: "POST",
                    data: {
                        emp_id: emp_id,
                        update: update,
                        name: name,
                        email: email
                    },
                    success: function(data) {
                        if (data)
                            location.reload();
                        else alert(data);
                    }
                })
            })

            // password change formfill

            $(document).on("click", ".change_password-btn", function(e) {
                $("#change_password-modal").show();
                var emp_id = $(this).data("eid");
                var change_password_formfill = "change_password_formfill";
                $.ajax({
                    url: "php/employee_profile_ajax.php",
                    method: "POST",
                    data: {
                        emp_id: emp_id,
                        change_password_formfill: change_password_formfill,
                    },
                    success: function(data) {
                        $("#change_password-form").html(data);
                    }
                })

            })

            // save changed password 
            $(document).on("click", "#change_password", function(e) {
                var emp_id = $("#emp_id").val();
                var new_password = $("#new_password").val();
                var confirm_password = $("#confirm_new_password").val();
                var password_change = "password_change";



                if (confirm_password != new_password) {
                    $(".content").html("Password and Confirm Password are not same.");
                    $(".alert").addClass("alert-warning")
                    $("#change_password-modal").hide();
                    $(".alert").show();
                } else if (new_password.length < 8) {
                    $(".content").html("Password lenght should be greater than or equal to 8.");
                    $(".alert").addClass("alert-warning")
                    $("#change_password-modal").hide();
                    $(".alert").show();
                } else {

                    $.ajax({
                        url: "php/employee_profile_ajax.php",
                        method: "POST",
                        data: {
                            emp_id: emp_id,
                            new_password: new_password,
                            password_change: password_change
                        },
                        success: function(data) {
                            if (data == "1") {
                                $(".content").html("Password Successfully Changed.");
                                $(".alert").addClass("alert-success")
                                $("#change_password-modal").hide();
                                $(".alert").show();
                            } else {
                                $(".content").html(data);
                                $(".alert").addClass("alert-danger")
                                $("#change_password-modal").hide();
                                $(".alert").show();

                            }
                        }
                    })
                }
            });

            // password change close
            $(document).on("click", "#change_password-close-btn", function(e) {
                $("#change_password-modal").hide();
            })

            // Delete 
            $(document).on("click", ".delete_profile-btn", function(e) {
                var data_id = $(this).data("eid");
                var element = this;
                var dlt_action = "delete";
                var conf = confirm("Dou want to delete this permanently");

                if (conf == true) {
                    $.ajax({
                        url: "php/employee_profile_ajax.php",
                        type: "POST",
                        data: {
                            data_id: data_id,
                            dlt_action: dlt_action
                        },
                        success: function(data) {
                            if (data == 1) {
                                $(element).closest("tr").fadeOut();
                                location.reload();
                            } else {
                                alert("Something went wrong.");
                            }
                        }
                    });

                }


            });






        });
    </script>
</body>

</html>