<!-- location filter starts here  -->
<div class="d-grid gap-2">
    <button id="open_location" class="filterbtn btn" style="font-weight: bold;">Location</button>
</div>

<div id="location_filterbar" class="filterbar mt-3" style="display: none;">
    <!-- ----------------------------------------------- -->
    <div class="d-grid gap-2">
        <button id="country_list" class="btn filterbtn mt-2">Country</button>
    </div>

    <div id="country_option" class="mt-2" style="display:none ;">
        <ul class="list-group ">
            <?php
            $sql = "SELECT DISTINCT country FROM hotel where status = 1 ORDER BY country";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='country' class='form-check-label'>
            <input type='checkbox' value='" . $row['country'] . "' class='form-check-input filter_check' id='country'>{$row['country']} 
        </label>
    </div>
</li>";
            }  ?>

        </ul>
    </div>

    <!-- ----------------------------------------------- -->
    <div class="d-grid gap-2">
        <button id="state_list" class="btn filterbtn mt-2">State</button>
    </div>

    <div id="state_option" class="mt-2" style="display:none ;">
        <ul class="list-group ">
            <?php
            $sql = "SELECT DISTINCT state FROM hotel ORDER BY state";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='state' class='form-check-label'>
            <input type='checkbox' value='" . $row['state'] . "' class='form-check-input filter_check' id='state'>{$row['state']} 
        </label>
    </div>
</li>";
            }  ?>

        </ul>
    </div>

    <!-- ----------------------------------------------- -->
    <div class="d-grid gap-2">
        <button id="city_list" class="btn filterbtn mt-2">City</button>
    </div>

    <div id="city_option" class="mt-2" style="display:none ;">
        <ul class="list-group ">
            <?php
            $sql = "SELECT DISTINCT city FROM hotel ORDER BY city";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='title' class='form-check-label'>
            <input type='checkbox' value='" . $row['city'] . "' class='form-check-input filter_check' id='city'>{$row['city']} 
        </label>
    </div>
</li>";
            }  ?>

        </ul>
    </div>
</div>

<!-- =========================================================== -->
<!-- title filter starts -->

<div class="d-grid gap-2">
    <button id="open_title" class="filterbtn btn" style="font-weight: bold;">Title</button>
</div>

<div id="title_filterbar" class="filterbar mt-3" style="display:none ;">
    <ul class="list-group">
        <?php
        $sql = "SELECT DISTINCT title FROM hotel ORDER BY title";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='title' class='form-check-label'>
            <input type='checkbox' value='" . $row['title'] . "' class='form-check-input filter_check' id='title'>{$row['title']} 
        </label>
    </div>
</li>";
        }  ?>

    </ul>







</div>


<!-- =========================================================== -->
<!-- hotel class filter starts -->

<div class="d-grid gap-2">
    <button id="open_hotel_class" class="filterbtn btn" style="font-weight: bold;">Hotel Class</button>
</div>

<div id="hotel_class_filterbar" class="filterbar mt-3" style="display:none ;">
    <ul class="list-group">
        <?php
        $sql = "SELECT DISTINCT hotel_class FROM hotel ORDER BY hotel_class";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='title' class='form-check-label'>
            <input type='checkbox' value='" . $row['hotel_class'] . "' class='form-check-input filter_check' id='hotel_class'>{$row['hotel_class']} 
        </label>
    </div>
</li>";
        }  ?>

    </ul>
</div>

<!-- ============================================================================ -->
<!-- hotel type filter starts here  -->

<div class="d-grid gap-2">
    <button id="open_hotel_type" class="filterbtn btn text-left" style="font-weight: bold;">Hotel Type</button>
</div>

<div id="hotel_type_filterbar" class="filterbar mt-3" style="display:none ;">
    <ul class="list-group">
        <?php
        $sql = "SELECT DISTINCT type_of_hotel FROM hotel ORDER BY type_of_hotel";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='title' class='form-check-label'>
            <input type='checkbox' value='" . $row['type_of_hotel'] . "' class='form-check-input filter_check' id='type_of_hotel'>{$row['type_of_hotel']} 
        </label>
    </div>
</li>";
        }  ?>

    </ul>
</div>

<!-- ============================================ -->
<!-- no of rooms filter starts here  -->

<div class="d-grid gap-2">
    <button id="open_rooms" class="filterbtn btn text-left" style="font-weight: bold;">Number of Rooms</button>
</div>

<div id="rooms_filterbar" class="filterbar" style="display:none ;">
    <div class="form-floating my-3">
        <input type="text" class="form-control" id="from" placeholder="From" autocomplete="off">
        <label for="from">From</label>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control" id="to" placeholder="To" autocomplete="off">
        <label for="to">To</label>
    </div>
    <div class="d-grid gap-2">
        <button class="m-2 btn filter_check">Search</button>
    </div>

</div>

<!-- ======================================================================================== -->
<!-- technology filter start here  -->



<div class="d-grid gap-2">
    <button id="open_technology" class="filterbtn btn">Technology</button>
</div>

<div id="technology_filterbar" class="filterbar mt-3" style="display: none;">

    <!-- ---------------------------------- -->
    <div class="d-grid gap-2">
        <button id="hrms_list" class="btn filterbtn">HRMS</button>
    </div>

    <div id="hrms_option" class="mt-2" style="display:none ;">
        <ul class="list-group ">
            <?php
            $sql = "SELECT DISTINCT hrms FROM hotel ORDER BY hrms";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='title' class='form-check-label'>
            <input type='checkbox' value='" . $row['hrms'] . "' class='form-check-input filter_check' id='hrms'>{$row['hrms']} 
        </label>
    </div>
</li>";
            }  ?>

        </ul>
    </div>


    <!-- -------------------------- -->
    <div class="d-grid gap-2">
        <button id="ats_list" class="btn filterbtn mt-2">ATS</button>
    </div>
    <div id="ats_option" class="mt-2" style="display:none ;">
        <ul class="list-group ">
            <?php
            $sql = "SELECT DISTINCT ats FROM hotel ORDER BY ats";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='title' class='form-check-label'>
            <input type='checkbox' value='" . $row['ats'] . "' class='form-check-input filter_check' id='ats'>{$row['ats']} 
        </label>
    </div>
</li>";
            }  ?>

        </ul>
    </div>

    <!-- --------------------------------------- -->
    <div class="d-grid gap-2">
        <button id="crm_list" class="btn filterbtn mt-2">CRM</button>
    </div>

    <div id="crm_option" class="mt-2" style="display:none ;">
        <ul class="list-group ">
            <?php
            $sql = "SELECT DISTINCT crm FROM hotel ORDER BY crm";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='title' class='form-check-label'>
            <input type='checkbox' value='" . $row['crm'] . "' class='form-check-input filter_check' id='crm'>{$row['crm']} 
        </label>
    </div>
</li>";
            }  ?>

        </ul>
    </div>

    <!-- ----------------------------------------------------- -->
    <div class="d-grid gap-2">
        <button id="erp_list" class="btn filterbtn mt-2">ERP</button>
    </div>

    <div id="erp_option" class="mt-2" style="display:none ;">
        <ul class="list-group ">
            <?php
            $sql = "SELECT DISTINCT erp FROM hotel ORDER BY erp";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='title' class='form-check-label'>
            <input type='checkbox' value='" . $row['erp'] . "' class='form-check-input filter_check' id='erp'>{$row['erp']} 
        </label>
    </div>
</li>";
            }  ?>

        </ul>
    </div>

    <!-- ------------------------------------------ -->
    <div class="d-grid gap-2">
        <button id="pos_list" class="btn filterbtn mt-2">POS</button>
    </div>
    <div id="pos_option" class="mt-2" style="display:none ;">
        <ul class="list-group ">
            <?php
            $sql = "SELECT DISTINCT pos FROM hotel ORDER BY pos";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='title' class='form-check-label'>
            <input type='checkbox' value='" . $row['pos'] . "' class='form-check-input filter_check' id='pos'>{$row['pos']} 
        </label>
    </div>
</li>";
            }  ?>

        </ul>
    </div>

    <!-- --------------------------------------------------- -->
    <div class="d-grid gap-2">
        <button id="rms_list" class="btn filterbtn mt-2">RMS</button>
    </div>

    <div id="rms_option" class="mt-2" style="display:none ;">
        <ul class="list-group ">
            <?php
            $sql = "SELECT DISTINCT rms FROM hotel ORDER BY rms";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='title' class='form-check-label'>
            <input type='checkbox' value='" . $row['rms'] . "' class='form-check-input filter_check' id='rms'>{$row['rms']} 
        </label>
    </div>
</li>";
            }  ?>

        </ul>
    </div>

    <!-- --------------------------------------------------- -->
    <div class="d-grid gap-2">
        <button id="cm_list" class="btn filterbtn mt-2">CM</button>
    </div>

    <div id="cm_option" class="mt-2" style="display:none ;">
        <ul class="list-group ">
            <?php
            $sql = "SELECT DISTINCT cm FROM hotel ORDER BY cm";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='title' class='form-check-label'>
            <input type='checkbox' value='" . $row['cm'] . "' class='form-check-input filter_check' id='cm'>{$row['cm']} 
        </label>
    </div>
</li>";
            }  ?>

        </ul>
    </div>

    <!-- --------------------------------------------- -->

    <div class="d-grid gap-2">
        <button id="pms_list" class="btn filterbtn mt-2">PMS</button>
    </div>


    <div id="pms_option" class="mt-2" style="display:none ;">
        <ul class="list-group ">
            <?php
            $sql = "SELECT DISTINCT pms FROM hotel ORDER BY pms";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='title' class='form-check-label'>
            <input type='checkbox' value='" . $row['pms'] . "' class='form-check-input filter_check' id='pms'>{$row['pms']} 
        </label>
    </div>
</li>";
            }  ?>

        </ul>
    </div>

    <!-- ----------------------------------------------- -->
    <div class="d-grid gap-2">
        <button id="ibe_list" class="btn filterbtn mt-2">IBE</button>
    </div>

    <div id="ibe_option" class="mt-2" style="display:none ;">
        <ul class="list-group ">
            <?php
            $sql = "SELECT DISTINCT ibe FROM hotel ORDER BY ibe";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='title' class='form-check-label'>
            <input type='checkbox' value='" . $row['ibe'] . "' class='form-check-input filter_check' id='ibe'>{$row['ibe']} 
        </label>
    </div>
</li>";
            }  ?>

        </ul>
    </div>

    <!-- ----------------------------------------------- -->
    <div class="d-grid gap-2">
        <button id="crs_list" class="btn filterbtn mt-2">CRS</button>
    </div>

    <div id="crs_option" class="mt-2" style="display:none ;">
        <ul class="list-group ">
            <?php
            $sql = "SELECT DISTINCT crs FROM hotel ORDER BY crs";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='title' class='form-check-label'>
            <input type='checkbox' value='" . $row['crs'] . "' class='form-check-input filter_check' id='crs'>{$row['crs']} 
        </label>
    </div>
</li>";
            }  ?>

        </ul>
    </div>
</div>

<div class="d-grid gap-2">
    <a href="data.php" id="clear_filter" class=" btn" style="font-weight: bold;font-style:italic;color:blue">Clear Filters</a>
</div>

<div class="d-grid gap-2">
    <a id="insert-btn" class=" btn" style="font-weight: bold;font-style:italic;color:blue">Insert New Data</a>
</div>

<div class="d-grid gap-2">
    <a id="upload-btn" class=" btn" style="font-weight: bold;font-style:italic;color:blue">Upload Bulk Data</a>
</div>

<?php 
 if($_SESSION['title'] == "administrator")
 echo '
<div class="d-grid gap-2">
    <a id="generate-report-btn" class=" btn" style="font-weight: bold;font-style:italic;color:blue;display:none">Generate Report</a>
</div>

<div class="d-grid gap-2">
    <a id="donload-data-btn" class=" btn" style="font-weight: bold;font-style:italic;color:blue">Download All Data</a>
</div>'

?>


<!-- ========================================================= -->
<script>
    $(document).ready(function() {

        $(".filter_check").click(function() {
            $("#generate-report-btn").show();

            var action = 'data';
            var title = get_filter_text('title');
            var hotel_class = get_filter_text('hotel_class');
            var type_of_hotel = get_filter_text('type_of_hotel');
            var hrms = get_filter_text('hrms');
            var ats = get_filter_text('ats');
            var crm = get_filter_text('crm');
            var erp = get_filter_text('erp');
            var pos = get_filter_text('pos');
            var rms = get_filter_text('rms');
            var cm = get_filter_text('cm');
            var pms = get_filter_text('pms');
            var ibe = get_filter_text('ibe');
            var crs = get_filter_text('crs');
            var country = get_filter_text('country');
            var state = get_filter_text('state');
            var city = get_filter_text('city');
            var from = get_min_value();
            var to = get_max_value();

            $.ajax({
                type: 'POST',
                url: "php/hotel_ajax.php",
                data: {
                    action: action,
                    title: title,
                    hotel_class: hotel_class,
                    type_of_hotel: type_of_hotel,
                    hrms: hrms,
                    ats: ats,
                    crm: crm,
                    erp: erp,
                    pos: pos,
                    rms: rms,
                    cm: cm,
                    pms: pms,
                    ibe: ibe,
                    crs: crs,
                    country: country,
                    state: state,
                    city: city,
                    from: from,
                    to: to
                },
                success: function(response) {
                    $("#result").html(response);

                }
            });

        });

        function get_min_value() {
            var small = 0;
            var min = $("#from").val();
            if (min != '') {
                small = min;
            }
            return small;
        }

        function get_max_value() {
            var big = Number.MAX_VALUE;
            var max = $("#to").val();
            if (max != '') {
                big = max;
            }
            return big;
        }


        function get_filter_text(text_id) {
            var filterData = [];
            $('#' + text_id + ':checked').each(function() {
                filterData.push($(this).val());
            });
            return filterData;
        }

    });
</script>