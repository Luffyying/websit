require(['jquery','Box'],function($,Box){
	 var b = new Box();
	 $('#btn').on('click',function(){
	 		
			b.init({
				width:500,
				height:300,
				title:'hello'
			});
		
	 });
});