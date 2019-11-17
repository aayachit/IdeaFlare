$(document).ready(function(e){

	//Variables
	var html = '<div> <div class="form-group mt-4"> <div class="row"> <div class="form-group col-md-6"> <label for="patent_name">Patent Name:</label>  </div> <div class="form-group col-md-6"> <input class="form-control" type="text" name="patent_name[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="patent_link">Patent Link:</label> </div>				<div class="form-group col-md-6"> <input class="form-control" type="text" name="patent_link[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="patent_authority">Patent Authority:</label> </div>				<div class="form-group col-md-6"> <input class="form-control" type="text" name="patent_authority[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="patent_number">Patent Number:</label>  </div> <div class="form-group col-md-6"> <input class="form-control" type="text" name="patent_number[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="patent_date">Patent Date:</label>  </div> <div class="form-group col-md-6"> <input class="form-control" type="date" name="patent_date[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="patent_details">Patent Details:</label>  </div> <div class="form-group col-md-6"> <textarea name="patent_details[]" class="form-control" rows="3" placeholder="max 200 characters"></textarea> </div> </div> </div>  <a href="#" id="remove_patent">-Remove</a> </div>';
	var max = 10;
	var num = 1;
	
	//add
	$('#add_patent').click(function(e){
		if(num<max){
			$('#field_patent').append(html);
			num++;
		}
	});

	//remove
	$('#field_patent').on('click', '#remove_patent', function(e){
		$(this).parent('div').remove();
		num--;
	});


});