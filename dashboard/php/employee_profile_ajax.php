<?php
include "dbconnect.php";

if (isset($_POST['add_employee'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $title = "analyst";


    $sql = "SELECT * FROM 0_emp_profile WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '2';
        die();
    } else {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $sql2 = "INSERT INTO 0_emp_profile(name,email,keyword,title) VALUES ('$name','$email','$password','$title');";

        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
            echo '3';
            die();
        } else {
            echo mysqli_error($conn);
            die();
        }
    }
}

if (isset($_POST['deactivate_emp'])) {
    $emp_id = $_POST['emp_id'];
    $sql = "UPDATE 0_emp_profile SET status = '0' WHERE emp_id = '$emp_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '1';
    } else {
        echo 0;
    }
}

if (isset($_POST['activate_emp'])) {
    $emp_id = $_POST['emp_id'];
    $sql = "UPDATE 0_emp_profile SET status = '1' WHERE emp_id = '$emp_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '1';
    } else {
        echo 0;
    }
}

if (isset($_POST['update_formfill'])) {
    $emp_id = $_POST['emp_id'];

    $sql = "SELECT * FROM 0_emp_profile WHERE emp_id ='$emp_id' ";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $output = '
            <tr>
               <td>Name:</td>
               <td><input type="text" style="width: 100%;" value="' . $row["name"] . '" id="update-name"></td>
               </tr>
               <tr>  
               <td>Title:</td>
               <td><input type="text" style="width: 100%;" readonly = "true" value=" ' . $row["title"] . '" id="update-title"></td>
               </tr>
               <tr>
               <td>Email:</td>
               <td colspan = "3"><input type="text" style="width: 100%;" value="' . $row["email"] . '" id="update-email"></td>
               </tr>
               <tr>
                <td><input type="hidden" value = "' . $row["emp_id"] . '" id ="emp-id" ></td>
                <td><input type="submit" style="width: 100%;" id="update_submit" value="Update Profile"></td>
            </tr>';

                echo $output;
            }
        } else {
            echo "No record found." . mysqli_error($conn);
        }
    } else {
        echo "Something went wrong. ";
    }
}

if (isset($_POST['update'])) {
    $emp_id = $_POST['emp_id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "UPDATE 0_emp_profile SET name = '$name',email = '$email' WHERE emp_id = '$emp_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['change_password_formfill'])) {
    $emp_id = $_POST['emp_id'];
    $output = '
    <tr>
        <td>New Password:</td>
        <td><input type="password" style="width: 100%;"  id="new_password"></td>
    </tr>
    <tr>  
        <td>Confirm Password:</td>
        <td><input type="password" style="width: 100%;"  id="confirm_new_password"></td>
    </tr>
    <tr>
        <td><input type="hidden" value = "' . $emp_id . '" id ="emp_id" ></td>
        <td><input type="submit" id="change_password" style="width: 100%;" value="Chnage Password"></td>
    </tr>
    ';
    echo $output;
}

if (isset($_POST['password_change'])) {
    $emp_id = $_POST['emp_id'];
    $password_post = mysqli_real_escape_string($conn, $_POST['new_password']);
    $password_secure = password_hash($password_post, PASSWORD_BCRYPT);

    $sql3 = "UPDATE 0_emp_profile SET keyword = '$password_secure' WHERE emp_id = '$emp_id'";
    $result3 = mysqli_query($conn, $sql3);
    if ($result3) {
        echo '1';
        die();
    } else {
        echo mysqli_error($conn);
        die();
    }
}

// delete profile 

if (isset($_POST['dlt_action'])) {
    $id = $_POST['data_id'];
    $sql2 = "DELETE FROM 0_emp_profile WHERE emp_id = {$id} ";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2) {
        echo '1';
    } else {
        echo mysqli_error($conn);
    }
}
