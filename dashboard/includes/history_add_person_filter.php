<!-- =========================================================== -->
<!-- industry filter starts -->

<div class="d-grid gap-2">
    <button id="open_industry" class="filterbtn btn" style="font-weight: bold;">Industry</button>
</div>

<div id="industry_filterbar" class="filterbar" style="display:none ;">
    <ul class="list-group">
        <?php
        $sql = "SELECT DISTINCT industry FROM 0_add_person_track ORDER BY industry";
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



<!-- title filter start here  -->
<div class="d-grid gap-2">
    <button id="open_title" class="filterbtn btn" style="font-weight: bold;">Title</button>
</div>

<div id="title_filterbar" class="filterbar" style="display: none;">
    <ul class="list-group">
        <?php
        $sql = "SELECT DISTINCT title FROM 0_add_person_track ORDER BY title";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='industry' class='form-check-label'>
            <input type='checkbox' value='" . $row['title'] . "' class='form-check-input filter_check' id='title'>{$row['title']} 
        </label>
    </div>
</li>";
        }  ?>

    </ul>
</div>


<!-- =========================================================== -->



<!-- added By filter start here  -->
<div class="d-grid gap-2">
    <button id="open_added_by" class="filterbtn btn" style="font-weight: bold;">Updated By</button>
</div>

<div id="added_by_filterbar" class="filterbar" style="display: none;">
    <ul class="list-group">
        <?php
        $sql = "SELECT DISTINCT added_by FROM 0_add_person_track ORDER BY added_by";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['added_by'];
            $sql_name = "SELECT * FROM 0_emp_profile WHERE emp_id = '$id'";
            $result_name = mysqli_query($conn, $sql_name);
            $row_name = mysqli_fetch_assoc($result_name);
            echo "
<li class='list-group-item'>
    <div class='form-check'>
        <label for='industry' class='form-check-label'>
            <input type='checkbox' value='" . $row['added_by'] . "' class='form-check-input filter_check' id='added_by'>{$row_name['name']} 
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
        $sql = "SELECT DISTINCT date FROM 0_add_person_track ORDER BY date";
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
    <a href="history_add_person.php" id="clear_filter" class=" btn" style="font-weight: bold;font-style:italic;color:blue">Clear Filters</a>
</div>

<!-- ========================================================= -->

<script>
    $(document).ready(function() {

        $(".filter_check").click(function() {
            $("#generate-report-btn").show();

            var action = 'action';
            var industry = get_filter_text('industry');
            var title = get_filter_text('title');
            var added_by = get_filter_text('added_by');
            var date = get_filter_text('date');

            $.ajax({
                type: 'POST',
                url: "php/history_add_person_ajax.php",
                data: {
                    action: action,
                    industry: industry,
                    title: title,
                    added_by: added_by,
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