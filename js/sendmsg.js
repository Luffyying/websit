define(['jquery'],function($){
	$(function(){
		//send the message
      $('#sendmessage').on('click',function(){
      var name = $(':input[name="name"]');
			var phone = $(':input[name="phone"]');
			var email = $(':input[name="email"]');
			var message = $(':input[name="message"]');
           $.post('welcome/savemsg',{name:name.val(),phone:phone.val(),email:email.val(),message:message.val()},function(data){
           	 if(data=='success'){
           	 	alert('留言成功');
              name.val('Name*');
              name.val('Email*');
              name.val('Phone*');
              name.val('Message*');
              
           	 }else{
           	 	alert('留言失败，请重试...')
           	 }
           },'text');
      })
	})
});