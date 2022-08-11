<!-- =========================================================== -->
<!-- industry filter starts -->

<div class="d-grid gap-2">
    <button id="open_industry" class="filterbtn btn" style="font-weight: bold;">Industry</button>
</div>

<div id="industry_filterbar" class="filterbar" style="display:none ;">
    <ul class="list-group">
        <?php
        $sql = "SELECT DISTINCT industry FROM 0_update_track ORDER BY industry";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='industry' class='form-check-label'>
            <input type='checkbox' value='" . $row['industry'] . "' class='form-check-input filter_check' id='industry'>{$row['industry']} 
        </label>
    </div>
</li>";
        }  ?>

    </ul>

</div>


<!-- =========================================================== -->



<!-- column_name filter start here  -->
<div class="d-grid gap-2">
    <button id="open_column_name" class="filterbtn btn" style="font-weight: bold;">Column Name</button>
</div>

<div id="column_name_filterbar" class="filterbar" style="display: none;">
    <ul class="list-group">
        <?php
        $sql = "SELECT DISTINCT column_name FROM 0_update_track ORDER BY column_name";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='industry' class='form-check-label'>
            <input type='checkbox' value='" . $row['column_name'] . "' class='form-check-input filter_check' id='column_name'>{$row['column_name']} 
        </label>
    </div>
</li>";
        }  ?>

    </ul>
</div>


<!-- =========================================================== -->



<!-- Updated By filter start here  -->
<div class="d-grid gap-2">
    <button id="open_updated_by" class="filterbtn btn" style="font-weight: bold;">Updated By</button>
</div>

<div id="updated_by_filterbar" class="filterbar" style="display: none;">
    <ul class="list-group">
        <?php
        $sql = "SELECT DISTINCT updated_by FROM 0_update_track ORDER BY updated_by";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['updated_by'];
            $sql_name = "SELECT * FROM 0_emp_profile WHERE emp_id = '$id'";
            $result_name = mysqli_query($conn, $sql_name);
            $row_name = mysqli_fetch_assoc($result_name);
            echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='industry' class='form-check-label'>
            <input type='checkbox' value='" . $row['updated_by'] . "' class='form-check-input filter_check' id='updated_by'>{$row_name['name']} 
        </label>
    </div>
</li>";
        }  ?>

    </ul>
</div>

<!-- =========================================================== -->



<!-- date filter start here  -->
<div class="d-grid gap-2">
    <button id="open_date" class="filterbtn btn" style="font-weight: bold;">Date</button>
</div>

<div id="date_filterbar" class="filterbar" style="display: none;">
    <ul class="list-group">
        <?php
        $sql = "SELECT DISTINCT date FROM 0_update_track ORDER BY date";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='industry' class='form-check-label'>
            <input type='checkbox' value='" . $row['date'] . "' class='form-check-input filter_check' id='date'>{$row['date']} 
        </label>
    </div>
</li>";
        }  ?>

    </ul>
</div>


<!-- -------------------------------------- -->

<div class="d-grid gap-2">
    <a href="history_update.php" id="clear_filter" class=" btn" style="font-weight: bold;font-style:italic;color:blue">Clear Filters</a>
</div>

<!-- ========================================================= -->

<script>
    $(document).ready(function() {

        $(".filter_check").click(function() {
            $("#generate-report-btn").show();

            var action = 'action';
            var industry = get_filter_text('industry');
            var column_name = get_filter_text('column_name');
            var updated_by = get_filter_text('updated_by');
            var date = get_filter_text('date');

            $.ajax({
                type: 'POST',
                url: "php/history_update_ajax.php",
                data: {
                    action: action,
                    industry: industry,
                    column_name: column_name,
                    updated_by: updated_by,
                    date: date
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