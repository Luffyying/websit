<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<base href="<?php echo site_url()?>">
	<style>
		body{
			background: #000;
			-webkit-perspective: 800px;
		}
		#container{
			width: 300px;
			height: 300px;
			margin: 150px auto;
			-webkit-transform-style:preserve-3d;
			-webkit-animation:rotateCube 2s linear 2;
		}
		@-webkit-keyframes rotateCube{
			from{

			}
			to{
				-webkit-transform:rotateY(-360deg);
			}
		}
		.cube{
			border-radius: 10px;
			border: 1px solid #fff;
			width: 300px;
			height: 300px;
			text-align: center;
			font-size: 70px;
			color:#000;
			line-height: 300px;
			position: absolute;
			background: #fff;
			opacity: 0.4;
		}
		.four{
			-webkit-transform: rotateY(180deg)  scale3d(1,1,1) translateZ(150px);
		}
		.three{
			-webkit-transform: rotateY(90deg) scale3d(1,1,1) translateZ(150px) ;
		}
		.five{
			-webkit-transform: rotateY(-90deg) scale3d(1,1,1) translateZ(150px) ;

		}
		.one{
			-webkit-transform: rotateX(90deg) scale3d(1,1,1) translateZ(150px) ;

		}
		.six{
			-webkit-transform: rotateX(-90deg) scale3d(1,1,1) translateZ(150px) ;

		}
		.two{
			-webkit-transform: scale3d(1,1,1) translateZ(150px) ;

		}
	</style>
</head>
<body>
	<div id="container">
	<!-- 父元素带动子元素旋转 -->
		<div class="cube one">1</div>
		<div class="cube two">2</div> 
		<div class="cube three">3</div>
		<div class="cube four">4</div>
		<div class="cube five">5</div>
		<div class="cube six">6</div>
	</div>
</body>
</html>