$(document).on('click', '.btn-submit-inbound', function () {
    let formInbound = $('.form-submit-inbound');
    formInbound.attr('onsubmit', 'return true');
    formInbound.submit();
});

$(function(){
    $("#sale_price, #price").keyup(function(e){
      $(this).val(format($(this).val()));
    });
});

var format = function(num){
    var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
    if(str.indexOf(".") > 0) {
      parts = str.split(".");
      str = parts[0];
    }
    str = str.split("").reverse();
    for(var j = 0, len = str.length; j < len; j++) {
      if(str[j] != ",") {
        output.push(str[j]);
        if(i%3 == 0 && j < (len - 1)) {
          output.push(",");
        }
        i++;
      }
    }
    formatted = output.reverse().join("");
    return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
};

$(document).on('click', '#button-trigger-modal-edit-product-category', function () {
  let id = $(this).attr('data-id');

  $.ajaxSetup({
      headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
  });

  $.ajax({
      url: "/ajax/product-category/"+id+"/edit",
      method: "get",
      processData: false,
      contentType: false,
      success: function(response) {
          $("#data-edit-product-category-modal").html(response);
      },
      error: function(xhr, status, error) {
      }
  });
});

$(document).on('click', '#button-trigger-modal-edit-rack', function () {
  let id = $(this).attr('data-id');

  $.ajaxSetup({
      headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
  });

  $.ajax({
      url: "/ajax/rack/"+id+"/edit",
      method: "get",
      processData: false,
      contentType: false,
      success: function(response) {
          $("#data-edit-rack-modal").html(response);
      },
      error: function(xhr, status, error) {
      }
  });
});

$(document).on('click', '#button-trigger-modal-edit-supplier', function () {
  let id = $(this).attr('data-id');

  $.ajaxSetup({
      headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
  });

  $.ajax({
      url: "/ajax/supplier/"+id+"/edit",
      method: "get",
      processData: false,
      contentType: false,
      success: function(response) {
          $("#data-edit-supplier-modal").html(response);
      },
      error: function(xhr, status, error) {
      }
  });
});