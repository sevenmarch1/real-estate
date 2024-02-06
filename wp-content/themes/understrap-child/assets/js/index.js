$(document).ready(function () {

  bsCustomFileInput.init();

  $(".estateForm").submit(function (event) {
    event.preventDefault();
    
    var formData = new FormData(this);

    var ajaxurl = $(".estateForm").data('ajax-url');
    $.ajax({
      type: "POST",
      url: ajaxurl,
      data: formData,
      dataType: "json",
      processData: false, 
      contentType: false,
    }).done(function (response) {
      $("form").html(
        '<div class="alert alert-success">' + response.message + "</div>"
      );
    }).fail(function (response) {
      $("form").html(
        '<div class="alert alert-danger">' + response.message + "</div>"
      );
    });


  });
});