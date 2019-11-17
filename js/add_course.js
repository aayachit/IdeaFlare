$(document).ready(function(e){

	//Variables
	var html = '<div> <div class="form-group mt-4"><div class="row"> <div class="form-group col-md-6"> <label for="course-name">Course Name:</label>  </div> <div class="form-group col-md-6"> <input class="form-control" type="text" name="course_name[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="course-link">Course Link:</label> </div>				 <div class="form-group col-md-6"> <input class="form-control" type="text" name="course_link[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="course-authority">Course Authority:</label></div> <div class="form-group col-md-6"> <input class="form-control" type="text" name="course_authority[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="course-number">Course Number:</label>  </div> <div class="form-group col-md-6"> <input class="form-control" type="text" name="course_number[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="course-date">Course Date:</label>  </div> <div class="form-group col-md-6"> <input class="form-control" type="date" name="course_date[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="course-details">Course Details:</label>  </div> <div class="form-group col-md-6"> <textarea name="course_details[]" class="form-control" rows="3" placeholder="max 200 characters"></textarea> </div> </div> </div> <a href="#" id="remove_course">-Remove</a> </div>';
	var max = 10;
	var num = 1;
	
	//add
	$('#add_course').click(function(e){
		if(num<max){
			$('#field_course').append(html);
			num++;
		}
	});

	//remove
	$('#field_course').on('click', '#remove_course', function(e){
		$(this).parent('div').remove();
		num--;
	});


});