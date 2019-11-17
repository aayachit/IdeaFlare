$(document).ready(function(e){

	//Variables
	var html = '<div> <div class="form-group mt-4"> <div class="row"> <div class="form-group col-md-6"> <label for="workshop-name">Workshop Name:</label>  </div> <div class="form-group col-md-6"> <input class="form-control" type="text" name="workshop_name[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="workshop-authority">Workshop Authority:</label> </div>				<div class="form-group col-md-6"> <input class="form-control" type="text" name="workshop_authority[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="workshop-date">Workshop Date:</label>  </div> <div class="form-group col-md-6"> <input class="form-control" type="date" name="workshop_date[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="workshop-details">Workshop Details:</label>  </div> <div class="form-group col-md-6"> <textarea name="workshop_details[]" class="form-control" rows="3" placeholder="max 200 characters"></textarea> </div> </div> </div> <a href="#" id="remove_workshop">-Remove</a> </div>';
	var max = 10;
	var num = 1;
	
	//add
	$('#add_workshop').click(function(e){
		if(num<max){
			$('#field_workshop').append(html);
			num++;
		}
	});

	//remove
	$('#field_workshop').on('click', '#remove_workshop', function(e){
		$(this).parent('div').remove();
		num--;
	});


});