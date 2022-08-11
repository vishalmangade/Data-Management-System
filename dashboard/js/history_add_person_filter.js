$(document).ready(function () {
  $("#open_industry").click(function (e) {
    e.preventDefault();
    $("#industry_filterbar").toggle(500);
    $("#title_filterbar").hide(500);
    $("#added_by_filterbar").hide(500);
    $("#date_filterbar").hide(500);
  });

  $("#open_title").click(function (e) {
    e.preventDefault();
    $("#industry_filterbar").hide(500);
    $("#title_filterbar").toggle(500);
    $("#added_by_filterbar").hide(500);
    $("#date_filterbar").hide(500);
  });

  $("#open_added_by").click(function (e) {
    e.preventDefault();
    $("#industry_filterbar").hide(500);
    $("#title_filterbar").hide(500);
    $("#added_by_filterbar").toggle(500);
    $("#date_filterbar").hide(500);
  });

  $("#open_date").click(function (e) {
    e.preventDefault();
    $("#industry_filterbar").hide(500);
    $("#title_filterbar").hide(500);
    $("#added_by_filterbar").hide(500);
    $("#date_filterbar").toggle(500);
  });
});
