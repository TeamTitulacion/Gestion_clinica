$(document).ready(function () {
    var current = 1,
      current_step,
      next_step,
      steps;
    steps = $("fieldset").length;
    $(".next").click(function () {
      current_step = $(this).parent();
      next_step = $(this).parent().next();
      next_step.show();
      current_step.hide();
      setProgressBar(++current);
      $("#progressbar li").eq($("fieldset").index(next_step)).addClass("active");
  
      //show the next fieldset
      next_step.show();
      //hide the current fieldset with style
      current_step.animate(
        { opacity: 0 },
        {
          step: function (now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0.2;
            //2. bring next_fs from the right(50%)
            left = now * 50 + "%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
              transform: "scale(" + scale + ")",
              position: "absolute"
            });
            next_fs.css({ left: left, opacity: opacity });
          },
          duration: 800,
          complete: function () {
            current_fs.hide();
            animating = false;
          },
          //this comes from the custom easing plugin
          easing: "easeInOutBack"
        }
      );
    });
    $(".previous").click(function () {
      current_step = $(this).parent();
      next_step = $(this).parent().prev();
      next_step.show();
      current_step.hide();
      setProgressBar(--current);
      $("#progressbar li").eq($("fieldset").index(current_step)).removeClass("active");
      
      //show the previous fieldset
      next_step.show(); 
      //hide the current fieldset with style
      current_step.animate({opacity: 0}, {
          step: function(now, mx) {
              //as the opacity of current_fs reduces to 0 - stored in "now"
              //1. scale previous_fs from 80% to 100%
              scale = 0.8 + (1 - now) * 0.2;
              //2. take current_fs to the right(50%) - from 0%
              left = ((1-now) * 50)+"%";
              //3. increase opacity of previous_fs to 1 as it moves in
              opacity = 1 - now;
              current_fs.css({'left': left});
              previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
          }, 
          duration: 800, 
          complete: function(){
              current_fs.hide();
              animating = false;
          }, 
          //this comes from the custom easing plugin
          easing: 'easeInOutBack'
      });
    });
    setProgressBar(current);
    // Change progress bar action
    function setProgressBar(curStep) {
      var percent = parseFloat(100 / steps) * curStep;
      percent = percent.toFixed();
      $(".progress-bar")
        .css("width", percent + "%")
        .html(percent + "%");
    }
  });
  