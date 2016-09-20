<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>welcome the game</title>
	<base href="<?php echo site_url()?>">
	<style>
	    *{
	    	padding: 0;
	    	margin: 0;
	    }
	    ul ,ol{
	    	list-style: none;
	    }
		#container{
			width: 300px;
			height: 200px;
			background: #ccc;
			position: relative;
			top: 30px;
			margin: 0 auto;
		}
		#brand{
			/*position: absolute;*/
			height: 80px;
			line-height: 80px;
			margin: 0 auto;
			font-size: 30px;
			text-align: center;
		}
		#contend{
			width: 300px;
			height: 160px;
			background: pink;
		}
        .level li{
        	border: 1px solid #fff;
        	width: 300px;
        	height: 80px;
        	cursor: pointer;
        	/*background: #f00;*/
        	line-height: 80px;
        	margin: 0 auto;
        	text-align: center;
        }
        .select{
        	background: rgba(0,255,0,.5);	
        }
        a{
        	text-decoration: none;
        	font-size: 20px;
        }
	</style>
</head>
<body>
	<div id="container" >
		<div id="brand">
			SELECT THE LEVEL
		</div>
		<div id="contend">
			<ul class="level">
				<li><a href="showing/level1">Level 1</a></li>
				<li><a href="showing/level2">Level 2</a></li>
			</ul>	
		</div>
	</div>
	<script src="jsshow/jquery-1.11.1.js"></script>
	<script>
		$(function(){
			var $li = $('.level li');
			$li.click(function(){
				//alert('haha');
			}).hover(function(){
				$(this).addClass('select');
			},function(){
				$(this).removeClass('select');
			})
			})
	   
	    
	</script>
</body>
</html>