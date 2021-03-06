<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<base href="<?php echo site_url()?>">
	<title>Document</title>
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		ul{
			list-style: none;
		}
		#container{
			width: 50px;
			height: 50px;
			position: fixed;
			right: 20px;
			bottom: 20px;
		}
		#menu li{
			width: 50px;
			height: 50px;
			position: absolute;
			left: 0;
			top: 0;
			-webkit-transition: all 1s ease;
			/*-webkit-animation: scaleAnimate 0.4s ease;*/
		}
		#menu li.scaleAnimate{
			-webkit-animation: scaleAnimate 0.4s ease;
		}
		#home{
			width: 50px;
			height: 50px;
			position: absolute;
			left: 0;
			top: 0;
			-webkit-transition: transform .5s ease-in;
		}
		@-webkit-keyframes scaleAnimate{
			0%{
				-webkit-transform: rotate(-360deg) scale(1);
				opacity: 1;
			}
			50%{
				-webkit-transform: rotate(-360deg) scale(2);
				opacity: 0.3;
			}
			100%{
				-webkit-transform: rotate(-360deg) scale(1);
				opacity: 1;
			}
		}
	</style>
</head>
<body>
	<div id="container">
		<ul id="menu">
			<li><img src="imgshow/close.png" alt=""></li>
			<li><img src="imgshow/full.png" alt=""></li>
			<li><img src="imgshow/open.png" alt=""></li>
			<li><img src="imgshow/prev.png" alt=""></li>
			<li><img src="imgshow/refresh.png" alt=""></li>
		</ul>
		<div id="home">
			<img src="imgshow/home.png" alt="">
		</div>
	</div>
	<script>
		
		(function(){
			var oHome = document.querySelector('#home');
			var oMenu = document.querySelector('#menu');
			var aMenu = oMenu.querySelectorAll('li');

			var bClicked = true;
			oHome.addEventListener('click', function(){
				if(bClicked){
					this.style.WebkitTransform = 'rotate(-360deg)';
					showMenu();
				}else{
					this.style.WebkitTransform = 'rotate(0deg)';
					hideMenu();
				}
				bClicked = !bClicked;
			}, false);

			var fnMenuClick = function(){
				// this.style.WebkitAnimation = 'scaleAnimate 0.4s ease forwards';
				this.className = 'scaleAnimate';
				this.addEventListener('webkitAnimationEnd', function(){
					this.className = '';
				}, false);
			};
			for(var i=0; i<aMenu.length; i++){
				aMenu[i].addEventListener('click', fnMenuClick, false);
			}

			function showMenu(){
				for(var i=0; i<aMenu.length; i++){
					var x = -150 * Math.sin(i*22.5*Math.PI/180);
					var y = -150 * Math.cos(i*22.5*Math.PI/180);
					aMenu[i].style.WebkitTransitionDelay = '0.' + i + 's';
					aMenu[i].style.left = x + 'px';
					aMenu[i].style.top = y + 'px';
					// aMenu[i].style.WebkitTransform = 'translate('+x+'px, '+y+'px) rotate(-360deg)';
					aMenu[i].style.WebkitTransform = 'rotate(-360deg) ';


				}
			}
			function hideMenu(){
				for(var i=0; i<aMenu.length; i++){
					aMenu[i].style.WebkitTransitionDelay = '0.' + (4 - i) + 's';
					aMenu[i].style.left = 0;
					aMenu[i].style.top = 0;
					aMenu[i].style.WebkitTransform = 'rotate(0deg)';

				}
			}

		})();

	</script>
</body>
</html>