$(document).ready(function () {
    var current_step, next_step;
       $("fieldset").length;
    $(".next").click(function () {
      current_step = $(this).parent();
      next_step = $(this).parent().next();
      next_fs = $(this).parent().next();
      next_step.show();
      current_step.hide();
      $("#progressbar li").eq($("fieldset").index(next_step)).addClass("active");
  
      //show the next fieldset
      next_step.show();
      //hide the current fieldset with style
     
    });
    $(".previous").click(function () {
      current_step = $(this).parent();
      next_step = $(this).parent().prev();
      previous_fs = $(this).parent().prev();
      next_step.show();
      current_step.hide();
      $("#progressbar li").eq($("fieldset").index(current_step)).removeClass("active");
      
      //show the previous fieldset
      next_step.show(); 
      //hide the current fieldset with style
      
    });
  });
  