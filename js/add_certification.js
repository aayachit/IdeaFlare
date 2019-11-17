$(document).ready(function(e){

	//Variables
	var html = '<div> <div class="form-group mt-4"> <div class="row"> <div class="form-group col-md-6"> <label for="certification-name">Certification Name:</label>  </div> <div class="form-group col-md-6"> <input class="form-control" type="text" name="certification_name[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"><label for="certification-link">Certification Link:</label> </div> <div class="form-group col-md-6"> <input class="form-control" type="text" name="certification_link[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="certification-authority">Certification Authority:</label> </div>	<div class="form-group col-md-6"> <input class="form-control" type="text" name="certification_authority[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="certification-number">Certification Number:</label>  </div> <div class="form-group col-md-6"> <input class="form-control" type="text" name="certification_number[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="certification-date">Certification Date:</label>  </div> <div class="form-group col-md-6"> <input class="form-control" type="date" name="certification_date[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="certification-details">Certification Details:</label>  </div> <div class="form-group col-md-6"> <textarea name="certification_details[]" class="form-control" rows="3" placeholder="max 200 characters"></textarea> </div> </div> </div> <a href="#" id="remove_certification">-Remove</a> </div>';
	var max = 10;
	var num = 1;
	
	//add
	$('#add_certification').click(function(e){
		if(num<max){
			$('#field_certification').append(html);
			num++;
		}
	});

	//remove
	$('#field_certification').on('click', '#remove_certification', function(e){
		$(this).parent('div').remove();
		num--;
	});


});