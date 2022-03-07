$(document).ready(function(){
    
    var maxField = 13; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><div class="form-group col-lg-5"><input class="form-control" type="text" name="field_name[]" value=""/></div><div class="form-group col-lg-5"><input class="form-control" type="text" name="field_name[]" value="" /></div>  <a href="javascript:void(0);" class="remove_button col-lg-1" title="Remove field"><i class="fa fa-remove fa-1x"></i></a> <div class="col-lg-10"></div> </div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        console.log("exito");
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        console.log("ingreso");
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});