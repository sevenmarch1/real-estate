$(document).ready(function () {
  $("form").submit(function (event) {

    var formData = {
      square: $("#square").val(),
      price: $("#price").val(),
      houseroom: $("#houseroom").val(),
      floor: $("#floor").val(),
      address: $("#address").val(),
    };

    var ajaxurl = $("form").data('ajax-url');
    $.ajax({
      type: "POST",
      url: ajaxurl,
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (response) {
      $("form").html(
        '<div class="alert alert-success">' + response.message + "</div>"
      );
    }).fail(function (response) {
      $("form").html(
        '<div class="alert alert-danger">' + response.message + "</div>"
      );
    });

    event.preventDefault();
  });
});