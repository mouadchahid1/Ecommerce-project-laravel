// npm package: select2
// github link: https://github.com/select2/select2

$(function() {
  'use strict'

  if ($(".js-example-basic-single").length) {
    $(".js-example-basic-single").select2();

  }
  if ($(".group_name_permission").length) {
    $(".group_name_permission").select2({
      placeholder: "Select a groupe name",
   
    });
    
  }
  if ($(".role_name").length) {
    $(".role_name").select2({
      placeholder: "Select role name",
   
    });
    
  }
  
  if ($(".js-example-basic-multiple").length) {
    $(".js-example-basic-multiple").select2();
  }

});