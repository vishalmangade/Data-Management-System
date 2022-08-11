<?php
include "../includes/dbconnect.php";

session_start();
session_regenerate_id();


if (isset($_POST['action'])) {
  $sql = "SELECT * FROM hotel WHERE hotel_name !='' ";

  if (isset($_POST['country'])) {
    $country = implode("','", $_POST['country']);
    $sql .= "AND country IN('" . $country . "')";
  }

  if (isset($_POST['state'])) {
    $state = implode("','", $_POST['state']);
    $sql .= "AND state IN('" . $state . "')";
  }

  if (isset($_POST['city'])) {
    $city = implode("','", $_POST['city']);
    $sql .= "AND city IN('" . $city . "')";
  }

  if (isset($_POST['title'])) {
    $title = implode("','", $_POST['title']);
    $sql .= "AND title IN('" . $title . "')";
  }

  if (isset($_POST['hotel_class'])) {
    $hotel_class = implode("','", $_POST['hotel_class']);
    $sql .= "AND hotel_class IN('" . $hotel_class . "')";
  }

  if (isset($_POST['type_of_hotel'])) {
    $type_of_hotel = implode("','", $_POST['type_of_hotel']);
    $sql .= "AND type_of_hotel IN('" . $type_of_hotel . "')";
  }

  if (isset($_POST['hrms'])) {
    $hrms = implode("','", $_POST['hrms']);
    $sql .= "AND hrms IN('" . $hrms . "')";
  }

  if (isset($_POST['ats'])) {
    $ats = implode("','", $_POST['ats']);
    $sql .= "AND ats IN('" . $ats . "')";
  }

  if (isset($_POST['crm'])) {
    $crm = implode("','", $_POST['crm']);
    $sql .= "AND crm IN('" . $crm . "')";
  }

  if (isset($_POST['erp'])) {
    $erp = implode("','", $_POST['erp']);
    $sql .= "AND erp IN('" . $erp . "')";
  }

  if (isset($_POST['pos'])) {
    $pos = implode("','", $_POST['pos']);
    $sql .= "AND pos IN('" . $pos . "')";
  }

  if (isset($_POST['rms'])) {
    $rms = implode("','", $_POST['rms']);
    $sql .= "AND rms IN('" . $rms . "')";
  }

  if (isset($_POST['cm'])) {
    $cm = implode("','", $_POST['cm']);
    $sql .= "AND cm IN('" . $cm . "')";
  }

  if (isset($_POST['pms'])) {
    $pms = implode("','", $_POST['pms']);
    $sql .= "AND pms IN('" . $pms . "')";
  }

  if (isset($_POST['ibe'])) {
    $ibe = implode("','", $_POST['ibe']);
    $sql .= "AND ibe IN('" . $ibe . "')";
  }

  if (isset($_POST['crs'])) {
    $crs = implode("','", $_POST['crs']);
    $sql .= "AND crs IN('" . $crs . "')";
  }

  $from = $_POST['from'];
  $sql .= "AND number_of_rooms >= " . $from . " ";

  $to = $_POST['to'];
  $sql .= "AND number_of_rooms <= " . $to . " ";

  $sql .= "AND status = 1 ";




  $result = mysqli_query($conn, $sql);
  $output = '';


  if ($result->num_rows > 0) {
    $sno = 0;
    while ($row = mysqli_fetch_assoc($result)) {
      $sno = $sno + 1;
      $output .= "<tr>
            <th scope='row'>" . $sno . "</th>
            <td>" . $row['hrms'] . "</td>
            <td>" . $row['ats'] . "</td>
            <td>" . $row['crm'] . "</td>
            <td>" . $row['erp'] . "</td>
            <td>" . $row['pos'] . "</td>
            <td>" . $row['rms'] . "</td>
            <td>" . $row['cm'] . "</td>
            <td>" . $row['pms'] . "</td>
            <td>" . $row['ibe'] . "</td>
            <td>" . $row['crs'] . "</td>
            <td>" . $row['hotel_name'] . "</td>
            <td> <a href='http://" . $row['website'] . " ' target='_blank'>" . $row['website'] . "</a></td>
            <td>" . $row['street'] . "</td>
            <td>" . $row['city'] . "</td>
            <td>" . $row['state'] . "</td>
            <td>" . $row['zipcode'] . "</td>
            <td>" . $row['country'] . "</td>
            <td>" . $row['prefix'] . "</td>
            <td>" . $row['first_name'] . "</td>
            <td>" . $row['last_name'] . "</td>
            <td>" . $row['title'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['contact_number'] . "</td>
            <td>" . $row['number_of_rooms'] . "</td>
            <td>" . $row['hotel_class'] . "</td>
            <td>" . $row['adr'] . "</td>
            <td>" . $row['services'] . "</td>
            <td>" . $row['type_of_hotel'] . "</td>
            <td>" . $row['ownership'] . "</td>
            <td>" . $row['chain_name'] . "</td>
            <td>" . $row['facebook_url'] . "</td>
            <td>" . $row['alexa_rank'] . "</td>
            <td>" . $row['monthly_visitor'] . "</td>
            <td><button type='button' class='add_person-btn btn btn-sm btn-success p-1' data-eid =  " . $row['data_id'] . ">Add Person</button></td>
            <td><button type='button' class='edit-btn btn btn-sm btn-info p-1' data-eid =  " . $row['data_id'] . ">Update</button></td>
            <td><button type='button' class='delete-btn btn btn-sm btn-danger p-1' data-id =  " . $row['data_id'] . ">Delete</button></td>
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

// dalete data from home page

if (isset($_POST['dlt_action'])) {
  $id = $_POST['data_id'];
  $sql2 = "UPDATE hotel SET hotel.status = 0 WHERE data_id = {$id} ";
  $result2 = mysqli_query($conn, $sql2);
  if ($result2) {
    echo true;
  } else {
    echo mysqli_error($conn);
  }
}

// delete data from database permonently

if (isset($_POST['dlt_action'])) {
    $id = $_POST['data_id'];
    $sql2 = "DELETE FROM hotel WHERE data_id = {$id} ";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2) {
      echo 1;
    } else {
      echo mysqli_error($conn);
    }
  }

// return data in form for update 


if (isset($_POST['formfill'])) {
  $eid = $_POST['eid'];
  $sql3 = "SELECT * FROM hotel WHERE data_id = {$eid}";
  $result3 = mysqli_query($conn, $sql3);
  $output2 = " hiii";
  if (mysqli_num_rows($result3) > 0) {
    while ($row2 = mysqli_fetch_assoc($result3)) {
      $output2 .= '
      <tr>
      <td colspan="4" class="text-center">
        <h5>Technology</h5>
      </td>
    </tr>
    <tr>
      <td>HRMS:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["hrms"] . '" id="update-hrms"></td>
      <td>ATS:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["ats"] . '" id="update-ats"></td>
    </tr>
    <tr>
      <td>CRM:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["crm"] . '" id="update-crm"></td>
      <td>ERP:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["erp"] . '" id="update-erp"></td>
    </tr>
    <tr>
      <td>POS:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["pos"] . '" id="update-pos"></td>
      <td>RMS:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["rms"] . '" id="update-rms"></td>
    </tr>
    <tr>
      <td>CM:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["cm"] . '" id="update-cm"></td>
      <td>PMS:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["pms"] . '" id="update-pms"></td>
    </tr>
    <tr>
      <td>IBE:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["ibe"] . '" id="update-ibe"></td>
      <td>CRS:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["crs"] . '" id="update-crs"></td>
    </tr>
    <tr>
    <td colspan="4" class="text-center">
      <h5>Hotel Info</h5>
    </td>
  </tr>

    <tr>
      <td>Hotel Name: </td>
      <td colspan="3"><input type="text" style="width: 100%;" value = "' . $row2["hotel_name"] . '" id="update-hname"></td>
    </tr>


    <tr>
      <td>Website</td>
      <td colspan="3"><input type="text" style="width: 100%;" value = "' . $row2["website"] . '" id="update-website"></td>
    </tr>
    <tr>
      <td colspan="4">
        <h5 class="text-center">Address</h5>
      </td>
    </tr>
    <tr>
      <td>Street:</td>
      <td colspan="3"> <input type="text" style="width: 100%;" value = "' . $row2["street"] . '" id="update-street"></td>
    </tr>
    <tr>
      <td>City:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["city"] . '" id="update-city"></td>
      <td>State/Province:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["state"] . '" id="update-state"></td>
    </tr>
    <tr>
      <td>ZIP Code:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["zipcode"] . '" id="update-zipcode"></td>
      <td>Country:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["country"] . '" id="update-country"></td>
    </tr>
    <tr>
      <td colspan="4">
        <h5 class="text-center">Person Information</h5>
      </td>
    </tr>
    <tr>
      <td>Prefix</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["prefix"] . '" id="update-prefix"></td>
      <td>Title</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["title"] . '" id="update-title"></td>
    </tr>
    <tr>
      <td>First Name</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["first_name"] . '" id="update-fname"></td>
      <td>Last Name</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["last_name"] . '" id="update-lname"></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td colspan="3"><input type="text" style="width: 100%;" value = "' . $row2["email"] . '" id="update-email"></td>
    </tr>
    <tr>
      <td>Contact Number:</td>
      <td colspan="3"><input type="text" style="width: 100%;" value = "' . $row2["contact_number"] . '" id="update-contact"></td>
    </tr>
    <tr>
      <td colspan="4">
        <h5 class="text-center">Hotel Specifications</h5>
      </td>
    </tr>
    <tr>
      <td>No. of Rooms</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["number_of_rooms"] . '" id="update-room"></td>
      <td>Hotel Class</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["hotel_class"] . '" id="update-class"></td>
    </tr>
    <tr>
      <td>ADR</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["adr"] . '" id="update-adr"></td>
      <td>Type of Hotel:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["type_of_hotel"] . '" id="update-type"></td>
    </tr>
    <tr>
      <td>Services:</td>
      <td colspan="3"><input type="text" style="width: 100%;" value = "' . $row2["services"] . '" id="update-services"></td>
    </tr>
    <tr>
      <td>Ownership:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["ownership"] . '" id="update-ownership"></td>
      <td>Chain Name:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["chain_name"] . '" id="update-chain"></td>
    </tr>
    <tr>
      <td>Facebook URL:</td>
      <td colspan="3"><input type="text" style="width: 100%;" value = "' . $row2["facebook_url"] . '" id="update-fburl"></td>
    </tr>
    <tr>
      <td>Alexa Rank:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["alexa_rank"] . '" id="update-alexa"></td>
      <td>monthly Visitor:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row2["monthly_visitor"] . '" id="update-visitors"></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
     <td><input type="hidden" value = "' . $row2["data_id"] . '" id ="data-id" ></td>
      <td><input type="submit" id="update-submit" value="Update"></td>
    </tr>
      ';
    }
  }
  echo $output2;
}

// update data 

if (isset($_POST['update'])) {

  $data_id = mysqli_real_escape_string($conn, $_POST['data_id']);
  $hrms = mysqli_real_escape_string($conn, $_POST['hrms']);
  $ats = mysqli_real_escape_string($conn, $_POST['ats']);
  $crm = mysqli_real_escape_string($conn, $_POST['crm']);
  $erp = mysqli_real_escape_string($conn, $_POST['erp']);
  $pos = mysqli_real_escape_string($conn, $_POST['pos']);
  $rms = mysqli_real_escape_string($conn, $_POST['rms']);
  $cm = mysqli_real_escape_string($conn, $_POST['cm']);
  $pms = mysqli_real_escape_string($conn, $_POST['pms']);
  $ibe = mysqli_real_escape_string($conn, $_POST['ibe']);
  $crs = mysqli_real_escape_string($conn, $_POST['crs']);
  $hotel_name = mysqli_real_escape_string($conn, $_POST['hotel_name']);
  $website = mysqli_real_escape_string($conn, $_POST['website']);
  $country = mysqli_real_escape_string($conn, $_POST['country']);
  $street = mysqli_real_escape_string($conn, $_POST['street']);
  $city = mysqli_real_escape_string($conn, $_POST['city']);
  $state = mysqli_real_escape_string($conn, $_POST['state']);
  $zipcode = mysqli_real_escape_string($conn, $_POST['zipcode']);
  $prefix = mysqli_real_escape_string($conn, $_POST['prefix']);
  $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
  $number_of_rooms = mysqli_real_escape_string($conn, $_POST['number_of_rooms']);
  $hotel_class = mysqli_real_escape_string($conn, $_POST['hotel_class']);
  $adr = mysqli_real_escape_string($conn, $_POST['adr']);
  $services = mysqli_real_escape_string($conn, $_POST['services']);
  $type_of_hotel = mysqli_real_escape_string($conn, $_POST['type_of_hotel']);
  $ownership = mysqli_real_escape_string($conn, $_POST['ownership']);
  $chain_name = mysqli_real_escape_string($conn, $_POST['chain_name']);
  $facebook_url = mysqli_real_escape_string($conn, $_POST['facebook_url']);
  $alexa_rank = mysqli_real_escape_string($conn, $_POST['alexa_rank']);
  $monthly_visitor = mysqli_real_escape_string($conn, $_POST['monthly_visitor']);

  $sql4 = "UPDATE hotel SET hrms = '{$hrms}' ,ats = '{$ats}' ,crm = '{$crm}' ,erp = '{$erp}' ,pos = '{$pos}' ,rms = '{$rms}' ,cm = '{$cm}' ,pms= '{$pms}' ,ibe = '{$ibe}' ,crs = '{$crs}' ,hotel_name = '{$hotel_name}' ,website = '{$website}' ,country = '{$country}' ,street = '{$street}' ,city = '{$city}' ,state = '{$state}' ,zipcode = '{$zipcode}' ,prefix = '{$prefix}' ,first_name = '{$first_name}' ,last_name = '{$last_name}' ,title = '{$title}' ,email = '{$email}' ,contact_number = '{$contact_number}' ,number_of_rooms = '{$number_of_rooms}' ,hotel_class = '{$hotel_class}' ,adr= '{$adr}' ,services = '{$services}' ,type_of_hotel = '{$type_of_hotel}' , ownership = '{$ownership}' ,chain_name = '{$chain_name}' ,facebook_url = '{$facebook_url}' ,alexa_rank = '{$alexa_rank}' ,monthly_visitor = '{$monthly_visitor}' WHERE data_id = '{$data_id}'";


  $updated_by = mysqli_real_escape_string($conn, $_SESSION['emp_id']);

  $sql7 = "SELECT * FROM hotel WHERE data_id = $data_id";
  $result7 = mysqli_query($conn, $sql7);
  if (mysqli_num_rows($result7) > 0) {
    while ($row7 = mysqli_fetch_assoc($result7)) {
      $initial_pms = mysqli_real_escape_string($conn, $row7['pms']);
      $initial_ats = mysqli_real_escape_string($conn, $row7['ats']);
      $initial_hrms = mysqli_real_escape_string($conn, $row7['hrms']);
      $initial_crm = mysqli_real_escape_string($conn, $row7['crm']);
      $initial_erp = mysqli_real_escape_string($conn, $row7['erp']);
      $initial_cm = mysqli_real_escape_string($conn, $row7['cm']);
      $initial_crs = mysqli_real_escape_string($conn, $row7['crs']);
      $initial_ibe = mysqli_real_escape_string($conn, $row7['ibe']);
      $initial_rms = mysqli_real_escape_string($conn, $row7['rms']);
      $initial_pos = mysqli_real_escape_string($conn, $row7['pos']);
      $initial_hotel_name = mysqli_real_escape_string($conn, $row7['hotel_name']);
      $initial_website = mysqli_real_escape_string($conn, $row7['website']);
      $initial_prefix = mysqli_real_escape_string($conn, $row7['prefix']);
      $initial_country = mysqli_real_escape_string($conn, $row7['country']);
      $initial_street = mysqli_real_escape_string($conn, $row7['street']);
      $initial_city = mysqli_real_escape_string($conn, $row7['city']);
      $initial_state = mysqli_real_escape_string($conn, $row7['state']);
      $initial_zipcode = mysqli_real_escape_string($conn, $row7['zipcode']);
      $initial_first_name = mysqli_real_escape_string($conn, $row7['first_name']);
      $initial_last_name = mysqli_real_escape_string($conn, $row7['last_name']);
      $initial_title = mysqli_real_escape_string($conn, $row7['title']);
      $initial_email = mysqli_real_escape_string($conn, $row7['email']);
      $initial_contact_number = mysqli_real_escape_string($conn, $row7['contact_number']);
      $initial_number_of_rooms = mysqli_real_escape_string($conn, $row7['number_of_rooms']);
      $initial_adr = mysqli_real_escape_string($conn, $row7['adr']);
      $initial_services = mysqli_real_escape_string($conn, $row7['services']);
      $initial_type_of_hotel = mysqli_real_escape_string($conn, $row7['type_of_hotel']);
      $initial_ownership = mysqli_real_escape_string($conn, $row7['ownership']);
      $initial_chain_name = mysqli_real_escape_string($conn, $row7['chain_name']);
      $initial_facebook_url = mysqli_real_escape_string($conn, $row7['facebook_url']);
      $initial_alexa_rank = mysqli_real_escape_string($conn, $row7['alexa_rank']);
      $initial_monthly_visitor = mysqli_real_escape_string($conn, $row7['monthly_visitor']);


      if ($initial_pms != $pms) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'PMS', '$initial_pms', '$pms',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_ats != $ats) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'ATS', '$initial_ats', '$ats',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_hrms != $hrms) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'hrms', '$initial_hrms', '$hrms',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_crm != $crm) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'crm', '$initial_crm', '$crm',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_erp != $erp) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'erp', '$initial_erp', '$erp',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_cm != $cm) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'cm', '$initial_cm', '$cm',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_crs != $crs) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'crs', '$initial_crs', '$crs',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_ibe != $ibe) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'ibe', '$initial_ibe', '$ibe',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_rms != $rms) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'rms', '$initial_rms', '$rms',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_pos != $pos) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'pos', '$initial_pos', '$pos',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_hotel_name != $hotel_name) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'Hotel', '$initial_hotel_name', '$hotel_name', '$updated_by')";
        mysqli_query($conn, $sql);
      }

      if ($initial_website != $website) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'Website', '$initial_website', '$website',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_prefix != $prefix) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'prefix', '$initial_prefix', '$prefix',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_country != $country) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'Country', '$initial_country', '$country',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_street != $street) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'Street', '$initial_street', '$street',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_city != $city) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'City', '$initial_city', '$city',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_state != $state) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'State', '$initial_state', '$state',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_zipcode != $zipcode) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'Zipcode', '$initial_zipcode', '$zipcode',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_first_name != $first_name) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'First Name', '$initial_first_name', '$first_name',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_last_name != $last_name) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'Last Name', '$initial_last_name', '$last_name',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_title != $title) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'Title', '$initial_title', '$title',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_email != $email) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'Email', '$initial_email', '$email',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_contact_number != $contact_number) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'Contact Number', '$initial_contact_number', '$contact_number',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_number_of_rooms != $number_of_rooms) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'number of rooms', '$initial_number_of_rooms', '$number_of_rooms',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_adr != $adr) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'adr', '$initial_adr', '$adr',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_services != $services) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'services', '$initial_services', '$services',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_type_of_hotel != $type_of_hotel) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'Hotel type', '$initial_type_of_hotel', '$type_of_hotel',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_ownership != $ownership) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'hrms', '$initial_hrms', '$hrms',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_chain_name != $chain_name) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'chain name', '$initial_chain_name', '$chain_name',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_facebook_url != $facebook_url) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'facebook url', '$initial_facebook_url', '$facebook_url',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_alexa_rank != $alexa_rank) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'alexa rank', '$initial_alexa_rank', '$alexa_rank',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
      if ($initial_monthly_visitor != $monthly_visitor) {
        $sql = "INSERT INTO `0_update_track` (`industry`,`company_name`, `column_name`,  `from`, `to`, `updated_by`) VALUES ('Hotel','$hotel_name', 'monthly visitor', '$initial_monthly_visitor', '$monthly_visitor',  '$updated_by')";
        mysqli_query($conn, $sql);
      }
    }
  }


  $result4 = mysqli_query($conn, $sql4);
  if ($result4) {
    echo true;
  } else {
    echo mysqli_error($conn);
  }
}

// insert new data 

if (isset($_POST['insert-submit'])) {
  $hrms = mysqli_real_escape_string($conn, $_POST['insert-hrms']);
  $ats = mysqli_real_escape_string($conn, $_POST['insert-ats']);
  $crm = mysqli_real_escape_string($conn, $_POST['insert-crm']);
  $erp = mysqli_real_escape_string($conn, $_POST['insert-erp']);
  $pos = mysqli_real_escape_string($conn, $_POST['insert-pos']);
  $rms = mysqli_real_escape_string($conn, $_POST['insert-rms']);
  $cm = mysqli_real_escape_string($conn, $_POST['insert-cm']);
  $pms = mysqli_real_escape_string($conn, $_POST['insert-pms']);
  $ibe = mysqli_real_escape_string($conn, $_POST['insert-ibe']);
  $crs = mysqli_real_escape_string($conn, $_POST['insert-crs']);
  $hotel_name = mysqli_real_escape_string($conn, $_POST['insert-hname']);
  $website = mysqli_real_escape_string($conn, $_POST['insert-website']);
  $country = mysqli_real_escape_string($conn, $_POST['insert-country']);
  $street = mysqli_real_escape_string($conn, $_POST['insert-street']);
  $city = mysqli_real_escape_string($conn, $_POST['insert-city']);
  $state = mysqli_real_escape_string($conn, $_POST['insert-state']);
  $zipcode = mysqli_real_escape_string($conn, $_POST['insert-zipcode']);
  $prefix = mysqli_real_escape_string($conn, $_POST['insert-prefix']);
  $first_name = mysqli_real_escape_string($conn, $_POST['insert-fname']);
  $last_name = mysqli_real_escape_string($conn, $_POST['insert-lname']);
  $title = mysqli_real_escape_string($conn, $_POST['insert-title']);
  $email = mysqli_real_escape_string($conn, $_POST['insert-email']);
  $contact_number = mysqli_real_escape_string($conn, $_POST['insert-contact']);
  $number_of_rooms = mysqli_real_escape_string($conn, $_POST['insert-room']);
  $hotel_class = mysqli_real_escape_string($conn, $_POST['insert-class']);
  $adr = mysqli_real_escape_string($conn, $_POST['insert-adr']);
  $services = mysqli_real_escape_string($conn, $_POST['insert-services']);
  $type_of_hotel = mysqli_real_escape_string($conn, $_POST['insert-type']);
  $ownership = mysqli_real_escape_string($conn, $_POST['insert-ownership']);
  $chain_name = mysqli_real_escape_string($conn, $_POST['insert-chain']);
  $facebook_url = mysqli_real_escape_string($conn, $_POST['insert-fburl']);
  $alexa_rank = mysqli_real_escape_string($conn, $_POST['insert-alexa']);
  $monthly_visitor = mysqli_real_escape_string($conn, $_POST['insert-visitors']);

  $sql5 = "INSERT INTO hotel (status,hrms,ats,crm,erp,pos,rms,cm,pms,ibe,crs,hotel_name,website,country,street,city,hotel.state,zipcode,prefix,first_name,last_name,title,email,contact_number,number_of_rooms, hotel_class, adr, services,type_of_hotel,hotel.ownership,chain_name,facebook_url,alexa_rank,monthly_visitor) VALUES (1,'$hrms','$ats','$crm' ,'$erp','$pos','$rms','$cm','$pms','$ibe','$crs','$hotel_name','$website','$country','$street','$city','$state','$zipcode','$prefix','$first_name','$last_name','$title','$email','$contact_number','$number_of_rooms','$hotel_class','$adr','$services','$type_of_hotel','$ownership','$chain_name','$facebook_url','$alexa_rank','$monthly_visitor');";

  $added_by = mysqli_real_escape_string($conn, $_SESSION['emp_id']);

  $sql6 = "INSERT INTO `0_add_person_track` (`industry`, `company_name`, `prefix`,  `first_name`, `last_name`, `title`, `email`, `added_by`) VALUES ('Hotels', '$hotel_name', '$prefix', '$first_name', '$last_name', '$title', '$email', '$added_by')";

  mysqli_query($conn, $sql6);

  $result5 = mysqli_query($conn, $sql5);
  if ($result5) {
    echo header('Location:../data.php');
  } else {
    echo "Something Went Wrong.Please Contact IT team.";
  }
}

// Add person form fill
if (isset($_POST['add_person_formfill'])) {
  $eid = $_POST['eid'];
  $sql6 = "SELECT * FROM hotel WHERE data_id = {$eid}";
  $result6 = mysqli_query($conn, $sql6);
  $output6 = " hiii";
  if (mysqli_num_rows($result6) > 0) {
    while ($row6 = mysqli_fetch_assoc($result6)) {
      $output6 .= '
      <tr>
      <td colspan="4" class="text-center">
        <h5>Technology</h5>
      </td>
    </tr>
    <tr>
      <td>HRMS:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["hrms"] . '" readonly="true" name="insert-hrms"></td>
      <td>ATS:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["ats"] . '" readonly="true" name="insert-ats"></td>
    </tr>
    <tr>
      <td>CRM:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["crm"] . '" readonly="true" name="insert-crm"></td>
      <td>ERP:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["erp"] . '" readonly="true" name="insert-erp"></td>
    </tr>
    <tr>
      <td>POS:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["pos"] . '" readonly="true" name="insert-pos"></td>
      <td>RMS:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["rms"] . '" readonly="true" name="insert-rms"></td>
    </tr>
    <tr>
      <td>CM:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["cm"] . '" readonly="true" name="insert-cm"></td>
      <td>PMS:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["pms"] . '" readonly="true" name="insert-pms"></td>
    </tr>
    <tr>
      <td>IBE:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["ibe"] . '" readonly="true" name="insert-ibe"></td>
      <td>CRS:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["crs"] . '" readonly="true" name="insert-crs"></td>
    </tr>
    <tr>
    <td colspan="4" class="text-center">
      <h5>Hotel Info</h5>
    </td>
  </tr>

    <tr>
      <td>Hotel Name: </td>
      <td colspan="3"><input type="text" style="width: 100%;" value = "' . $row6["hotel_name"] . '" readonly="true" name="insert-hname"></td>
    </tr>


    <tr>
      <td>Website</td>
      <td colspan="3"><input type="text" style="width: 100%;" value = "' . $row6["website"] . '" readonly="true" name="insert-website"></td>
    </tr>
    <tr>
      <td colspan="4">
        <h5 class="text-center">Address</h5>
      </td>
    </tr>
    <tr>
      <td>Street:</td>
      <td colspan="3"> <input type="text" style="width: 100%;" value = "' . $row6["street"] . '" readonly="true" name="insert-street"></td>
    </tr>
    <tr>
      <td>City:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["city"] . '" readonly="true" name="insert-city"></td>
      <td>State/Province:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["state"] . '" readonly="true" name="insert-state"></td>
    </tr>
    <tr>
      <td>ZIP Code:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["zipcode"] . '" readonly="true" name="insert-zipcode"></td>
      <td>Country:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["country"] . '" readonly="true" name="insert-country"></td>
    </tr>
    <tr>
      <td colspan="4">
        <h5 class="text-center">Person Information</h5>
      </td>
    </tr>
    <tr>
      <td>Prefix</td>
      <td><input type="text" style="width: 100%;" name="insert-prefix"></td>
      <td>Title</td>
      <td><input type="text" style="width: 100%;"   name="insert-title"></td>
    </tr>
    <tr>
      <td>First Name</td>
      <td><input type="text" style="width: 100%;"  required name="insert-fname"></td>
      <td>Last Name</td>
      <td><input type="text" style="width: 100%;"   name="insert-lname"></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td colspan="3"><input type="text" style="width: 100%;"  name="insert-email"></td>
    </tr>
    <tr>
      <td>Contact Number:</td>
      <td colspan="3"><input type="text" style="width: 100%;" value = "' . $row6["contact_number"] . '" readonly="true" name="insert-contact"></td>
    </tr>
    <tr>
      <td colspan="4">
        <h5 class="text-center">Hotel Specifications</h5>
      </td>
    </tr>
    <tr>
      <td>No. of Rooms</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["number_of_rooms"] . '" readonly="true" name="insert-room"></td>
      <td>Hotel Class</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["hotel_class"] . '" readonly="true" name="insert-class"></td>
    </tr>
    <tr>
      <td>ADR</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["adr"] . '" readonly="true" name="insert-adr"></td>
      <td>Type of Hotel:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["type_of_hotel"] . '" readonly="true" name="insert-type"></td>
    </tr>
    <tr>
      <td>Services:</td>
      <td colspan="3"><input type="text" style="width: 100%;" value = "' . $row6["services"] . '" readonly="true" name="insert-services"></td>
    </tr>
    <tr>
      <td>Ownership:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["ownership"] . '" readonly="true" name="insert-ownership"></td>
      <td>Chain Name:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["chain_name"] . '" readonly="true" name="insert-chain"></td>
    </tr>
    <tr>
      <td>Facebook URL:</td>
      <td colspan="3"><input type="text" style="width: 100%;" value = "' . $row6["facebook_url"] . '" readonly="true" name="insert-fburl"></td>
    </tr>
    <tr>
      <td>Alexa Rank:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["alexa_rank"] . '" readonly="true" name="insert-alexa"></td>
      <td>monthly Visitor:</td>
      <td><input type="text" style="width: 100%;" value = "' . $row6["monthly_visitor"] . '" readonly="true" name="insert-visitors"></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
     <td><input type="hidden" value = "' . $row6["data_id"] . '" name ="data-name" ></td>
      <td><input type="submit"  name="insert-submit" value="Add New Person"></td>
    </tr>
      ';
    }
  }
  echo $output6;
}


if (isset($_POST["bulk_upload"])) {
    echo "vishal111";
  // required library files 
  include "../lib/PHPExcel/PHPExcel.php";
  include "../lib/PHPExcel/PHPExcel/IOFactory.php";
  echo "vishal";

  $ext = pathinfo($_FILES['data_file']['name'], PATHINFO_EXTENSION);
  if ($ext == "xlsx") {
    $file = $_FILES['data_file']['tmp_name'];
    $obj = PHPExcel_IOFactory::load($file);

    foreach ($obj->getWorksheetIterator() as $sheet) {
      $n =  $sheet->getHighestRow();
      $count = 0;
      for ($i = 2; $i <= $n; $i++) {
        $hrms = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(0, $i)->getValue());
        $ats = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(1, $i)->getValue());
        $crm = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(2, $i)->getValue());
        $erp = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(3, $i)->getValue());
        $pos = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(4, $i)->getValue());
        $rms = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(5, $i)->getValue());
        $cm = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(6, $i)->getValue());
        $pms = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(7, $i)->getValue());
        $ibe = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(8, $i)->getValue());
        $crs = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(9, $i)->getValue());
        $hotel_name = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(10, $i)->getValue());
        $website = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(11, $i)->getValue());
        $country = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(16, $i)->getValue());
        $street = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(12, $i)->getValue());
        $city = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(13, $i)->getValue());
        $state = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(14, $i)->getValue());
        $zipcode = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(15, $i)->getValue());
        $prefix = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(17, $i)->getValue());
        $first_name = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(18, $i)->getValue());
        $last_name = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(19, $i)->getValue());
        $title = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(20, $i)->getValue());
        $email = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(21, $i)->getValue());
        $contact_number = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(22, $i)->getValue());
        $number_of_rooms = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(23, $i)->getValue());
        $hotel_class = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(24, $i)->getValue());
        $adr = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(25, $i)->getValue());
        $services = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(26, $i)->getValue());
        $type_of_hotel = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(27, $i)->getValue());
        $ownership = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(28, $i)->getValue());
        $chain_name = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(29, $i)->getValue());
        $facebook_url = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(30, $i)->getValue());
        $alexa_rank = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(31, $i)->getValue());
        $monthly_visitor = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(32, $i)->getValue());

        echo $hrms;

        if ($hotel_name != "") {
          $sql7 = "INSERT INTO hotel (hrms,ats,crm,erp,pos,rms,cm,pms,ibe,crs,hotel_name,website,country,street,city,hotel.state,zipcode,prefix,first_name,last_name,title,email,contact_number,number_of_rooms, hotel_class, adr, services,type_of_hotel,hotel.ownership,chain_name,facebook_url,alexa_rank,monthly_visitor) VALUES ('$hrms','$ats','$crm' ,'$erp','$pos','$rms','$cm','$pms','$ibe','$crs','$hotel_name','$website','$country','$street','$city','$state','$zipcode','$prefix','$first_name','$last_name','$title','$email','$contact_number','$number_of_rooms','$hotel_class','$adr','$services','$type_of_hotel','$ownership','$chain_name','$facebook_url','$alexa_rank','$monthly_visitor');";

          $result7 = mysqli_query($conn, $sql7);


          if ($result7)
            $count++;
          else {
            echo $count;
            echo mysqli_error($conn);
            echo "<br>";
          }
        }
      }
      echo $n . "   " . $count;
    //   echo "<script>
    //         window.location.href='../hotel.php';
    //       </script>";
    }
  } else {
    echo "<script>
            alert('Invalid File. Please Upload xlsx file only');
            window.location.href='../hotels.php';
          </script>";
  }
}

// Donaloa all data and generate report
// table start
$data_table = '<table >
      <thead>
            <tr>
            <th scope="col">Sr.No.</th>
            <th scope="col">HRMS</th>
            <th scope="col">ATS</th>
            <th scope="col">CRM</th>
            <th scope="col">ERP</th>
            <th scope="col">POS</th>
            <th scope="col">RMS</th>
            <th scope="col">CM</th>
            <th scope="col">PMS</th>
            <th scope="col">IBE</th>
            <th scope="col">CRS</th>
            <th scope="col">Hotel Name</th>
            <th scope="col">Website</th>
            <th scope="col">street</th>
            <th scope="col">City</th>
            <th scope="col">State/Province</th>
            <th scope="col">Zipcode</th>
            <th scope="col">country</th>
            <th scope="col">Prefix</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Title</th>
            <th scope="col">Email</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Number of Rooms</th>
            <th scope="col">Hotel Class</th>
            <th scope="col">ADR</th>
            <th scope="col">Services</th>
            <th scope="col">Type of Hotel</th>
            <th scope="col">Onwership</th>
            <th scope="col">Chain Name</th>
            <th scope="col">Facebook URL</th>
            <th scope="col">Alexa Rank</th>
            <th scope="col">Monthly Visitors</th>';
if (isset($_POST['generate_report'])) {
  $data_table .= '<th colspan="3" scope="col">Delete These Columns</th>';
}

$data_table .= '</tr>
      </thead>
        <tbody>';

// download all data
if (isset($_POST['download_data'])) {
  $sql = "SELECT * FROM `hotel` where hotel.status = 1";
  $result = mysqli_query($conn, $sql);
  $sno = 0;
  while ($row = mysqli_fetch_assoc($result)) {
    $sno = $sno + 1;
    $data_table .= "<tr>
    <th scope='row'>" . $sno . "</th>
            <td>" . $row['hrms'] . "</td>
            <td>" . $row['ats'] . "</td>
            <td>" . $row['crm'] . "</td>
            <td>" . $row['erp'] . "</td>
            <td>" . $row['pos'] . "</td>
            <td>" . $row['rms'] . "</td>
            <td>" . $row['cm'] . "</td>
            <td>" . $row['pms'] . "</td>
            <td>" . $row['ibe'] . "</td>
            <td>" . $row['crs'] . "</td>
            <td>" . $row['hotel_name'] . "</td>
            <td> <a href='http://" . $row['website'] . " ' target='_blank'>" . $row['website'] . "</a></td>
            <td>" . $row['street'] . "</td>
            <td>" . $row['city'] . "</td>
            <td>" . $row['state'] . "</td>
            <td>" . $row['zipcode'] . "</td>
            <td>" . $row['country'] . "</td>
            <td>" . $row['prefix'] . "</td>
            <td>" . $row['first_name'] . "</td>
            <td>" . $row['last_name'] . "</td>
            <td>" . $row['title'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['contact_number'] . "</td>
            <td>" . $row['number_of_rooms'] . "</td>
            <td>" . $row['hotel_class'] . "</td>
            <td>" . $row['adr'] . "</td>
            <td>" . $row['services'] . "</td>
            <td>" . $row['type_of_hotel'] . "</td>
            <td>" . $row['ownership'] . "</td>
            <td>" . $row['chain_name'] . "</td>
            <td>" . $row['facebook_url'] . "</td>
            <td>" . $row['alexa_rank'] . "</td>
            <td>" . $row['monthly_visitor'] . "</td>
  </tr>";
  }
  $data_table .= "
   </tbody>
  </table>";
  date_default_timezone_set("Asia/Kolkata");
  $filename = "Hotels - All Data " . date('d-m-y  H-i-s') . ".xls";
  Print_XLS($data_table, $filename);
}

// Generate report
if (isset($_POST['generate_report'])) {
  $data_table .= $_POST['table_data'];
  date_default_timezone_set("Asia/Kolkata");
  $filename = "Hotels - Report " . date('d-m-y  H-i-s') . ".xls";
  Print_XLS($data_table, $filename);
}

// download xls function 
function Print_XLS($data_table, $filename)
{
  header('Content-Type:application/xls');
  header('Content-Disposition:attachment; filename=' . $filename);
  header('Pragma: no-cache');
  header('Expires: 0');
  echo $data_table;
}
