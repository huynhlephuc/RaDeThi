$(document).ready(function () {
  $("#khoaFormAdd").change(function () {
    var khoaChange = $(this).val();
    $.post("http://localhost/hotrorade/Ajax/getBoMon", { k: khoaChange }, function (data) {
      $("#boMonFormAdd").html(data);
    });
  });

  $("#khoaFormUpdate").change(function () {
    var khoaChange = $(this).val();
    $.post("http://localhost/hotrorade/Ajax/getBoMon2", { k: khoaChange }, function (data) {
      $("#boMonFormUpdate").html(data);
    });
  });

});
