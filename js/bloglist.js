// define(['jquery'],function($){
// 	$(function(){
// 		$('#more').on('click',function(){
// 			alert('haha');
// 		});
// 	})
// });
require(['jquery','gotop','sendmsg'],function($){
	$(function(){
		var count = 4;
		$('#more').on('click',function(){
			 that = this;
        	$(this).hide();
        	var oDiv = document.createElement('li');
            oDiv.className = 'blogs';
            oDiv.id='load';
            oDiv.style.cssText="width:100%;height:20px;" +
            "text-align:center;background:url(img/load.gif) no-repeat center;" +
            "background-size:contain"+"float:left";
            $('.lists').append(oDiv);
			$.get('welcome/more_detial_blog',{count:count},function(data){
				var html='';
				for(var i=0;i<data.length;i++){
					var blog = data[i];
					html+='<li>'+
    				'<img src="'+blog.img+'" alt="">'+
    				'<p>'+blog.title+'</p>'+
    				"<button class='read'>"+"<a href='welcome/blog_detial?id="+blog.blog_id+"'style='color:#fff'>READ</a></button>"+'</li>'
				}
				$('.lists').append(html);
				$('#load').remove();
				$(that).show();
			},'json');
			count = count+4;
		});
	})
});
	