$(document).ready(function () {
  $("#open_status").click(function (e) {
    e.preventDefault();
    $("#status_filterbar").toggle(500);
    $("#emp_id_filterbar").hide(500);
    $("#start_date_filterbar").hide(500);
  });

  $("#open_emp_id").click(function (e) {
    e.preventDefault();
    $("#status_filterbar").hide(500);
    $("#emp_id_filterbar").toggle(500);
    $("#start_date_filterbar").hide(500);
  });

  $("#open_start_date").click(function (e) {
    e.preventDefault();
    $("#status_filterbar").hide(500);
    $("#emp_id_filterbar").hide(500);
    $("#start_date_filterbar").toggle(500);
  });
});
