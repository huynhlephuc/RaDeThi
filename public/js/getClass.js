$(document).ready(function () {
    $("#monFormCreateExam").change(function () {
      var monChange = $(this).val();
      $.post("http://localhost/hotrorade/Ajax/getClass", { k: monChange }, function (data) {
        $("#lopFormCreateExam").html(data);
      });
    });
  
  });
  