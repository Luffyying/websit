<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<base href="<?php echo site_url()?>">
	<style type="text/css" media="screen">
	   #stage{
            width: 1000px;
            height: 500px;
            background: #ccc;
            border-radius: 4px;
            box-shadow:0 0 2px 1px rgba(0,0,1,.5);
            margin: 50px auto;
            -webkit-perspective: 500px;
			-webkit-perspective-origin: 50% -30%;
	   }
	   #container{
	   		width: 128px;
	   		height: 100px;
	   		left: 50%;
	   		margin-left: -64px;
	   		position: absolute;
	   		top:80px;
	   		-webkit-transform-style: preserve-3d;
			-webkit-transition: transform 1s ease;


	   }
	    #container img{
	    	position: absolute;
	    }	
	</style>
</head>
<body>
	<div id="stage">
		<div id="container">
			
		</div>
		<script>
			(function(){
				var oContainer = document.getElementById('container');
				var html= '';
				for(var i=0;i<9;i++)
				{
					html += '<img src="imgshow/m'+(i+1)+'.jpg" style="-webkit-transform:rotateY('+(40*i)+'deg) translateZ(200px);"/>';
				}
				oContainer.innerHTML = html;
				var index =0;
				oContainer.onclick = function(){
					index++;
					this.style.WebkitTransform = 'rotateY('+(index*40)+'deg)';
				};
			})();
			
		</script>
		
	</div>
</body>
</html>