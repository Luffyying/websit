define(['jquery'],function($){
	$(function(){
		var flag = true;
		$('#search-btn').on('click',function(){
			if(flag){
				  $('#search-box').animate({width:400});
			      $('#search-input').show();
			}else{
				$('#search-box').animate({width:30},function(){
					 $('#search-input').hide();
				});
			   
			}
			flag = !flag;
		  
		})
	});
});