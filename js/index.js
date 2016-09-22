require(['jquery','gotop','sendmsg','search'],function($){
	$(function(){
//  waitting
      
 //dynamic options   
        offset = 3;
		  $('#lists a').on('click',function(){
        offset = 3;
         $('#more').show();
         $('.nomore').remove();
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
    
      $('#more').on('click',function(){
        console.log(offset);
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
            $.get('welcome/get_more_shows',{offset:offset,cateId:cateId},function(data){
                if(data.length!=0){
                      var html = '';
                      for(var i=0;i<data.length;i++){
                      var blog= data[i];
                      html+= '<li class="blogs">'+
                                    '<a href="#">'+
                                        '<img src="'+blog.img+'"alt="">'+
                                        '<div class="blog">'+
                                            '<p class="blog-title">'+blog.title+'</p>'+
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
                  }else{
                    var html = "<li class='nomore'>:) no any more...</li>";
                     $('#blog-list').after(html);
                     $('#load').remove();
                  }
        },'json');
        offset=offset+3;
      });
     }); 
});
