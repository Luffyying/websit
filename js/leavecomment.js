$('#leavemessage').on('click',function(){
			var name = $(':input[name="name1"]');
			var phone = $(':input[name="phone1"]');
			var email = $(':input[name="email1"]');
			var bgid= $(':input[name="bgid"]');
			var message = $(':input[name="message1"]');
		    $.get('welcome/add_leavemsg',{name:name.val(),phone:phone.val(),email:email.val(),message:message.val(),
		    	bgid:bgid.val()},function(data){
		    		//console.log(data);
		    		//var comm = JSON.parse(data);
		    		//console.log(comm);
		    	var html = '<li>'+'<img src=""/>'+
    		'<span>'+'</span>'+'<p>'+data.content+'</p></li>';
    		$('.comlist').prepend(html);
    		name.val('Name');
    		phone.val('Phone');
    		email.val('Email');
    		message.val('Message');
		    },'json');
		});