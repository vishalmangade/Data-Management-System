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

    <title>CRM Profile</title>
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
            <div class="col-sm-3"></div>
            <div class="col-sm-6 mt-5">
                <h3 class="text-center">Admin Profile</h3>
                <div class="m-5 text-left">
                    <?php
                    $id = $_SESSION['emp_id'];
                    $sql = "SELECT * FROM 0_emp_profile WHERE emp_id = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '
                    <div >
                <h5>Name &nbsp;&nbsp;:&nbsp;   ' . $row['name'] . '</h5>
                <h5>Email  &nbsp;&nbsp;&nbsp;:&nbsp;  ' . $row['email'] . '</h5>
                <h5>Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; ' . $row['title'] . '</h5>
                
            </div>
                    
                    ';

                    ?>
                </div>
                <div class="text-center">
                    <?php
                    echo "
                <button type='button' class='update_profile-btn btn btn-sm btn-success p-1' data-eid=" . $_SESSION['emp_id'] . ">Update Profile</button>
                <button type='button' class='change_password-btn btn btn-sm btn-info p-1' data-eid=" . $_SESSION['emp_id'] . ">Change Password</button>

                ";

                    ?>



                </div>
            </div>
            <div class="col-sm-3"></div>



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
                            if (data == 1)
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


            });
        </script>
</body>

</html>