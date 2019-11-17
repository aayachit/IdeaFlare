$(document).ready(function(e){

	//Variables
	var html = '<div> <div class="form-group mt-4"> <label for="project-title">Project Title:</label> <input type="text" class="form-control" name="project_title[]" id="project_title" placeholder="Title"> </div> <div class="form-group"> <label for="project-description">Project Description:</label> <textarea name="project_description[]" id="project_description" class="form-control" rows="3" placeholder="max 200 characters"></textarea> </div> <div class="form-group"> <label for="project-docs">Upload Project Report(PDF):</label> <input type="file" accept=".pdf" name="project_report[]" id="project_report" class="form-control form-input Profile-input-file"> </div>  <a href="#" class="black" id="remove">-Remove</a> </div>';
	var max = 10;
	var num = 1;
	
	//add project
	$('#add').click(function(e){
		if(num<max){
			$('#field').append(html);
			num++;
		}
	});

	//remove
	$('#field').on('click', '#remove', function(e){
		$(this).parent('div').remove();
		num--;
	});


});