$(document).ready(function(e){

	//Variables
	var html = '<div>  <div class="form-group mt-5"> <div class="row"> <div class="form-group col-md-3"> <label for="duration">Duration:</label> </div> <div class="form-group col-md-2"> <input type="number" class="form-control" name="job-duration[]" id="job-duration" placeholder=""> </div> <div class="form-group col-md-2"><label for="months">Months</label></div> <div class="form-group col-md-2"> <label for="status">Status:</label></div> <div class="form-group col-md-3"> <select class="form-control" name="job-ongoing[]" id="job-ongoing"> <option value="1">Ongoing</option> <option value="0">Completed</option> </select> </div> </div> </div> <div class="form-group"> <div class="row"> <div class="form-group col-md-3"> <label for="company">Company Name:</label> </div> <div class="form-group col-md-9"> <input type="text" class="form-control" name="job-company[]"> </div> </div> </div> <div class="form-group"> <div class="row"> <div class="form-group col-md-3"> <label for="location">Location:</label> </div> <div class="form-group col-md-9"> <input type="text" class="form-control" name="job-location[]" id="job-location" placeholder="eg: Mumbai, Pune, Delhi, Bangalore"> </div> </div> </div> <div class="form-group"> <div class="row"> <div class="form-group col-md-3"> <label for="position">Position:</label> </div> <div class="form-group col-md-9"><input type="text" class="form-control" name="job-position[]" id="job-position" placeholder="eg: Manager, Intern"> </div> </div> </div>	<div class="form-group"> <div class="row"> <div class="form-group col-md-3"> <label for="resposibilities">Job Resposibilities:</label> </div> <div class="form-group col-md-9">					<textarea name="job-responsibilities[]" id="job-resposibilities" class="form-control" rows="3" placeholder="max 200 characters"></textarea></div> </div> </div>		<a href="#" class="black" id="remove_experience">-Remove</a> </div>';
	var max = 10;
	var num = 1;
	
	//add
	$('#add_experience').click(function(e){
		if(num<max){
			$('#field_experience').append(html);
			num++;
		}
	});

	//remove
	$('#field_experience').on('click', '#remove_experience', function(e){
		$(this).parent('div').remove();
		num--;
	});


});

