require(['jquery','gotop','sendmsg'],function($){
	$(function(){
 //dynamic options      
		  $('#lists a').on('click',function(){
      		$(this).parent().siblings().children('a').removeClass('active');
      		$(this).addClass('active');

      		var cateId = $(this).data('id');
      		$.get('welcome/get_shows',{cateId:cateId},function(data){
      			$('#blog-list').empty();
      			var html = '';
      			for(var i=0;i<data.length;i++){
      				var blog= data[i];
      				html+= '<li class="blogs">'+
                            '<a href="#">'+
                                '<img src="'+blog.img+'"alt="">'+
                                '<div class="blog">'+
                                    '<p class="blog-title">'+blog.title+'</p>'+
                                    '<span class="blog-clicked">'+blog.clicked+'</span>'+
                                '</div>'+
                                '<div class="mask">'+
                                    '<a href="'+blog.url+'" class="mask-btn">VIEW LUFFY</a>'+
                                '</div>'+
                            '</a>'+
                        '</li>'
      			}
      			$('#blog-list').append(html);
      		},'json')
      });
//dynamic loading the pic
      var count = 3;
      $('#more').on('click',function(){
        that = this;
        $(this).hide();
        var cateId = '';
        $('#lists a').each(function(){
             if($(this).attr('class') =='active'){
                 cateId = $(this).data('id');
             }
        });
            var oDiv = document.createElement('li');
            oDiv.className = 'blogs';
            oDiv.id='load';
            oDiv.style.cssText="width:100%;height:20px;" +
            "text-align:center;background:url(img/load.gif) no-repeat center;" +
            "background-size:contain"+"float:left";
            $('#blog-list').append(oDiv);
            $.get('welcome/get_more_shows',{count:count,cateId:cateId},function(data){
            console.log(data);
            var html = '';
            for(var i=0;i<data.length;i++){
              var blog= data[i];
              html+= '<li class="blogs">'+
                            '<a href="#">'+
                                '<img src="'+blog.img+'"alt="">'+
                                '<div class="blog">'+
                                    '<p class="blog-title">'+blog.title+'</p>'+
                                    '<span class="blog-clicked">'+blog.clicked+'</span>'+
                                '</div>'+
                                '<div class="mask">'+
                                    '<a href="'+blog.url+'" class="mask-btn">VIEW LUFFY</a>'+
                                '</div>'+
                            '</a>'+
                        '</li>'
            }
            $('#blog-list').append(html);
            $('#load').remove();
            $(that).show();
        },'json');
        count=count+3;
      });
//introduce yourself
      
      
    
      
     }); 
});
