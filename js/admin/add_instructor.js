$(document).ready(function(e){

	//Variables
	var html = '<div> <div class="row mt-4"><div class="form-group col-md-3"> <label for="instructor_name">Name:</label> </div> <div class="form-group col-md-9"> <input type="text" class="form-control" name="instructor_name[]" id="child_instructor_name" required> </div> </div> <div class="row"> <div class="form-group col-md-3"> <label for="instructor_contact">Contact No:</label> </div> <div class="form-group col-md-9"> <input type="number" class="form-control" name="instructor_contact[]" id="child_instructor_contact" required> </div> </div> <div class="row"><div class="form-group col-md-3"> <label for="instructor_email">Email ID:</label> </div> <div class="form-group col-md-9"> <input type="email" class="form-control" name="instructor_email[]" id="child_instructor_email" required> </div> </div> <a href="#" class="black" id="remove_instructor">-Remove</a> </div>';
	var max = 10;
	var num = 1;
	
	//add
	$('#add_instructor').click(function(e){
		if(num<max){
			$('#field_instructor').append(html);
			num++;
		}
	});

	//remove
	$('#field_instructor').on('click', '#remove_instructor', function(e){
		$(this).parent('div').remove();
		num--;
	});


});

