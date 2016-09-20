define(['jquery'],function($){
	$(function(){
		window.onscroll = function(){
			var scrollTop = document.documentElement.scrollTop||
			document.body.scrollTop;
			if(scrollTop>=400){
				$('#totop').show();
			}else{
				$('#totop').hide();
			}	
		};
		$('#totop').on('click',function(){
			$('html,body').animate({
			scrollTop:0
		},800);
		})
	})
});