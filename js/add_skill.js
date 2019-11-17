$(document).ready(function(e){

	//Variables
	var html = '<div> <div class="form-group mt-4"> <div class="row"> <div class="form-group col-xs-6 col-md-2 "> <label for="skill">Skill:</label> </div> <div class="form-group col-xs-6 col-md-4"> <input class="form-control" type="text" name="skill[]" id="child_skill"> </div> <div class="form-group col-xs-6 col-md-2"> <label for="rating">Rating:</label> </div>	<div class="form-group col-xs-6 col-md-4"> <select class="form-control" name="rating[]" id="rating"> <option value="Beginner">Beginner</option> <option value="Intermediate">Intermediate</option> <option value="Advanced">Advanced</option> </select> </div> </div>  <a href="#" class="black" id="remove_skill">-Remove</a> </div> </div>';
	var max = 10;
	var num = 1;
	
	//add project
	$('#add_skill').click(function(e){
		if(num<max){
			$('#field_skill').append(html);
			num++;
		}
	});

	//remove
	$('#field_skill').on('click', '#remove_skill', function(e){
		$(this).parent('div').remove();
		num--;
	});


});

