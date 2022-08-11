<?php
include "dbconnect.php";

if (isset($_POST['action'])) {
    $sql = "SELECT * FROM 0_add_person_track WHERE company_name !='' ";

    if (isset($_POST['industry'])) {
        $industry = implode("','", $_POST['industry']);
        $sql .= "AND industry IN('" . $industry . "')";
    }

    if (isset($_POST['title'])) {
        $title = implode("','", $_POST['title']);
        $sql .= "AND title IN('" . $title . "')";
    }

    if (isset($_POST['added_by'])) {
        $added_by = implode("','", $_POST['added_by']);
        $sql .= "AND added_by IN('" . $added_by . "')";
    }

    if (isset($_POST['date'])) {
        $date = implode("','", $_POST['date']);
        $sql .= "AND date IN('" . $date . "')";
    }

    $result = mysqli_query($conn, $sql);
    $output = '';


    if ($result->num_rows > 0) {
        $sno = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['added_by'];
            $sql_name = "SELECT * FROM 0_emp_profile WHERE emp_id = '$id'";
            $result_name = mysqli_query($conn, $sql_name);
            $row_name = mysqli_fetch_assoc($result_name);
            $sno = $sno + 1;
            $output .= "<tr>
            <th scope='row'>" . $sno . "</th>
            <td>" . $row['industry'] . "</td>
            <td>" . $row['company_name'] . "</td>
            <td>" . $row['prefix'] . "</td>
            <td>" . $row['first_name'] . "</td>
            <td>" . $row['last_name'] . "</td>
            <td>" . $row['title'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" .  $row_name['name'] . "</td>
            <td>" . $row['date'] . "</td>
            <td>" . $row['time'] . "</td>
        </tr>";
        }
    } else {
        $output = "<tr>
        <td colspan='12' class='text-center'>
            <h5>Record Not Found</h5>
        </td>
    </tr>";
    }

    echo $output;
}
