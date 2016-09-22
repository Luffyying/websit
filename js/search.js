define(['jquery'],function($){
	$(function(){
		var flag = false;
		$('#search-btn').on('click',function(){
			if(flag){
				  $('#search-input').animate({width:0},function(){
				  	  $('#search-input').css('placeholder',"");
				  });
			    
			}else{
				$('#search-input').animate({width:400},function(){
					  $('#search-input').css('placeholder',"Enter your search content");
				});
			   
			}
			flag = !flag;
		  
		})
	});
});