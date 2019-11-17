$(document).ready(function(e){

	//Variables
	var html = '<div> <div class="form-group mt-4"> <div class="row"> <div class="form-group col-md-6"> <label for="journal_name">Journal Name:</label>  </div> <div class="form-group col-md-6"> <input class="form-control" type="text" name="journal_name[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="journal_link">Journal Link:</label> </div>				 <div class="form-group col-md-6"> <input class="form-control" type="text" name="journal_link[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="journal_authority">Journal Authority:</label> </div>				 <div class="form-group col-md-6"> <input class="form-control" type="text" name="journal_authority[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="journal_date">Journal Date:</label>  </div> <div class="form-group col-md-6"> <input class="form-control" type="date" name="journal_date[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="journal_details">Journal Details:</label>  </div> <div class="form-group col-md-6"> <textarea name="journal_details[]" class="form-control" rows="3" placeholder="max 200 characters"></textarea> </div> </div> </div> <a href="#" id="remove_journal">-Remove</a> </div>';
	var max = 10;
	var num = 1;
	
	//add
	$('#add_journal').click(function(e){
		if(num<max){
			$('#field_journal').append(html);
			num++;
		}
	});

	//remove
	$('#field_journal').on('click', '#remove_journal', function(e){
		$(this).parent('div').remove();
		num--;
	});


});