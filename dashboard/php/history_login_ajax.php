<?php
include "dbconnect.php";

if (isset($_POST['action'])) {
    $sql = "SELECT * FROM 0_login_track WHERE emp_id !='' ";

    if (isset($_POST['status'])) {
        $status = implode("','", $_POST['status']);
        $sql .= "AND status IN('" . $status . "')";
    }

    if (isset($_POST['emp_id'])) {
        $emp_id = implode("','", $_POST['emp_id']);
        $sql .= "AND emp_id IN('" . $emp_id . "')";
    }

    if (isset($_POST['start_date'])) {
        $start_date = implode("','", $_POST['start_date']);
        $sql .= "AND start_date IN('" . $start_date . "')";
    }

    $result = mysqli_query($conn, $sql);
    $output = '';


    if ($result->num_rows > 0) {
        $sno = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $sno = $sno + 1;
            $sql_name = "SELECT * FROM 0_emp_profile WHERE emp_id = " . $row['emp_id'];
            $result_name = mysqli_query($conn, $sql_name);
            $row_name = mysqli_fetch_assoc($result_name);
            $status = "";
            if ($row['status'] == 1) {
                $status = "<td style='background-color:#8AFF81;'>Acive</td>";
            } else {
                $status = "<td style='background-color:#FC6565;'>Deacive</td>";
            }

            $output .= "<tr>
      <th scope='row'>" . $sno . "</th>
      <td>" . $row_name['name'] . "</td>
                ". $status . "
      <td>" . $row['start_date'] . "</td>
      <td>" . $row['start_time'] . "</td>
      <td>" . $row['end_date'] . "</td>
      <td>" . $row['end_time'] . "</td>
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
