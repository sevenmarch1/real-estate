$(document).ready(function () {
    $("form").submit(function (event) {
      var formData = {
        square: $("#square").val(),
        price: $("#price").val(),
        houseroom: $("#superheroAlias").val(),
        floor: $("#superheroAlias").val(),
        address: $("#superheroAlias").val(),
      };
  
      var ajaxurl = $("form").data('ajax-url');
      $.ajax({
        type: "POST",
        url: ajaxurl,
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function (data) {
        console.log(data);
      });
  
      event.preventDefault();
    });
  });