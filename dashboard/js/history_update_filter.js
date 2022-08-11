$(document).ready(function () {
  $("#open_industry").click(function (e) {
    e.preventDefault();
    $("#industry_filterbar").toggle(500);
    $("#column_name_filterbar").hide(500);
    $("#updated_by_filterbar").hide(500);
    $("#date_filterbar").hide(500);
  });

  $("#open_column_name").click(function (e) {
    e.preventDefault();
    $("#industry_filterbar").hide(500);
    $("#column_name_filterbar").toggle(500);
    $("#updated_by_filterbar").hide(500);
    $("#date_filterbar").hide(500);
  });

  $("#open_updated_by").click(function (e) {
    e.preventDefault();
    $("#industry_filterbar").hide(500);
    $("#column_name_filterbar").hide(500);
    $("#updated_by_filterbar").toggle(500);
    $("#date_filterbar").hide(500);
  });

  $("#open_date").click(function (e) {
    e.preventDefault();
    $("#industry_filterbar").hide(500);
    $("#column_name_filterbar").hide(500);
    $("#updated_by_filterbar").hide(500);
    $("#date_filterbar").toggle(500);
  });
});
