$(document).ready(function(e){

	//Variables
	var html = '<div> <div class="form-group mt-4"> <div class="row"> <div class="form-group col-md-6"> <label for="article_name">Article Name:</label>  </div> <div class="form-group col-md-6"> <input class="form-control" type="text" name="article_name[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="article_link">Article Link:</label> </div>				 <div class="form-group col-md-6"> <input class="form-control" type="text" name="article_link[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="article_authority">Article Authority:</label> </div>				 <div class="form-group col-md-6"> <input class="form-control" type="text" name="article_authority[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="article_number">Article Number:</label>  </div> <div class="form-group col-md-6"> <input class="form-control" type="text" name="article_number[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="article_date">Article Date:</label>  </div> <div class="form-group col-md-6"> <input class="form-control" type="date" name="article_date[]"> </div> </div> <div class="row"> <div class="form-group col-md-6"> <label for="article_details">Article Details:</label>  </div> <div class="form-group col-md-6"> <textarea name="article_details[]" class="form-control" rows="3" placeholder="max 200 characters"></textarea> </div> </div> </div> <a href="#" id="remove_article">-Remove</a> </div>';
	var max = 10;
	var num = 1;
	
	//add
	$('#add_article').click(function(e){
		if(num<max){
			$('#field_article').append(html);
			num++;
		}
	});

	//remove
	$('#field_article').on('click', '#remove_article', function(e){
		$(this).parent('div').remove();
		num--;
	});


});