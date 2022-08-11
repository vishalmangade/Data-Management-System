<!-- status filter starts -->

<div class="d-grid gap-2">
    <button id="open_status" class="filterbtn btn" style="font-weight: bold;">Status</button>
</div>

<div id="status_filterbar" class="filterbar" style="display:none ;">
    <ul class="list-group">
        <?php
        $sql = "SELECT DISTINCT status FROM 0_login_track ORDER BY status";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $status = " ";
            if ($row['status'] == 1) {
                $status = "Acive";
            } else {
                $status = "Deacive";
            }
            echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='status' class='form-check-label'>
            <input type='checkbox' value='" . $row['status'] . "' class='form-check-input filter_check' id='status'>{$status} 
        </label>
    </div>
</li>";
        }  ?>

    </ul>

</div>


<!-- =========================================================== -->



<!-- start_date filter start here  -->
<div class="d-grid gap-2">
    <button id="open_start_date" class="filterbtn btn" style="font-weight: bold;">Start Date</button>
</div>

<div id="start_date_filterbar" class="filterbar" style="display: none;">
    <ul class="list-group">
        <?php
        $sql = "SELECT DISTINCT start_date FROM 0_login_track ORDER BY start_date";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='status' class='form-check-label'>
            <input type='checkbox' value='" . $row['start_date'] . "' class='form-check-input filter_check' id='start_date'>{$row['start_date']} 
        </label>
    </div>
</li>";
        }  ?>

    </ul>
</div>


<!-- =========================================================== -->



<!-- emp_id filter start here  -->
<div class="d-grid gap-2">
    <button id="open_emp_id" class="filterbtn btn" style="font-weight: bold;">Employee Name</button>
</div>

<div id="emp_id_filterbar" class="filterbar" style="display: none;">
    <ul class="list-group">
        <?php
        $sql = "SELECT DISTINCT emp_id FROM 0_login_track ORDER BY emp_id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $emp = $row['emp_id'];
            $sql_name = "SELECT * FROM 0_emp_profile WHERE emp_id = '$emp'";
            $result_name = mysqli_query($conn, $sql_name);
            $row_name = mysqli_fetch_assoc($result_name);
            echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='status' class='form-check-label'>
            <input type='checkbox' value='" . $row['emp_id'] . "' class='form-check-input filter_check' id='emp_id'>{$row_name['name']} 
        </label>
    </div>
</li>";
        }  ?>

    </ul>
</div>

<!-- -------------------------------------- -->

<div class="d-grid gap-2">
    <a href="history_login.php" id="clear_filter" class=" btn" style="font-weight: bold;font-style:italic;color:blue">Clear Filters</a>
</div>

<!-- ========================================================= -->

<script>
    $(document).ready(function() {

        $(".filter_check").click(function() {
            $("#generate-report-btn").show();

            var action = 'data';
            var status = get_filter_text('status');
            var start_date = get_filter_text('start_date');
            var emp_id = get_filter_text('emp_id');


            $.ajax({
                type: 'POST',
                url: "php/history_login_ajax.php",
                data: {
                    action: action,
                    status: status,
                    start_date: start_date,
                    emp_id: emp_id
                },
                success: function(response) {
                    $("#result").html(response);
                }
            });

        });


        function get_filter_text(text_id) {
            var filterData = [];
            $('#' + text_id + ':checked').each(function() {
                filterData.push($(this).val());
            });
            return filterData;
        }

    });
</script>