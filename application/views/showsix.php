<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<base href="<?php echo site_url()?>">
	<title>Document</title>
	<style>
		body{
			background: url('imgshow/bg.jpg') ;
			overflow: hidden;
		}
		#container{
			width: 100%;
			height: 100%;
			position: absolute;
			top: 0;
			left: 0;
			/*from the initial*/
			
		}
		#container .img{
			position: absolute;
			cursor: pointer;
			border:6px solid #fff;
			box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.7);
			-webkit-transition:all 1.5s ease-in-out;
			/*-moz-transition:all 1.5s ease-in-out;
			-ms-transition:all 1.5s ease-in-out;
			-o-transition:all 1.5s ease-in-out;
			transition:all 1.5s ease-in-out;*/
		}
		#container .img.piece{
			/*合并之后的小格子的效果*/
			border:1px solid #fff;
			box-shadow: 0px 0px 2px black;
		}
		#container .img span{
			position: absolute;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			opacity: 0;
			-webkit-transition:opacity 0.5s ease-in-out;
		}
		#prev,#next{
			position: absolute;
			width: 60px;
			height: 60px;
			top: 50%；
			margin-top:-30px;
			border:1px solid #999;
			box-shadow: 0 0 1px rgba(0 0 0 0.7);
			z-index:1;
			opacity: 0.6;
		}
		#prev{
			left: -20px;
			background:  url(imgshow/prev.png) center no-repeat #fff;
			border-radius: 0 8px 8px 0;
		}
		#next{
			right: -20px;
			background:  url(imgshow/next.png) center no-repeat #fff;
			border-radius:  8px 0 0 8px;
		}
    </style>
</head>
<body>
	<div id="container">
	
	</div>
	<span id="prev" href="javascript:;"></span>
	<span id="next" href="javascript:;"></span>
	
	<script>
		(function(){
			var oContainer = document.getElementById('container'),
			oPrev = document.getElementById('prev'),
			oNext = document.getElementById('next');

			var bClicked = false;//if click the block
			var ROW = 3,
			COL = 3,
			NUM = 9,
			BIG_IMG_WIDTH = 700,
			BIG_IMG_HEIGHT = 420,
			THUMB_IMG_WIDTH = THUMB_IMG_HEIGTH = 125;
			//define the data you need，
			//preonload all the pictures 
			//wait all pictures had been onload
			var iLoaded = 0;
			var iNow = 0;
			for(var i=1;i<=NUM;i++)
			{
				var oBigImg = new Image();
				oBigImg.src = 'imgshow/' + i + '.jpg';
				oBigImg.onload = function(){
					if(++iLoaded ==NUM *2){
						loadSuccess();
					}
				};
				var oThumbImg = new Image();
				oThumbImg.src = 'imgshow/thumbs/' + i + '.jpg';
				oThumbImg.onload = function(){
					if(++iLoaded ==NUM *2){
						loadSuccess();
					}
				};
				
				
			}
			function loadSuccess(){
				var index =0;
				var iColGap =(oContainer.offsetWidth-COL*THUMB_IMG_WIDTH)/(COL+1);
				var iRowGap =(oContainer.offsetHeight-ROW*THUMB_IMG_HEIGTH)/(ROW+1);
				for(var i=0;i<ROW;i++){
					for(var j=0;j<COL;j++){
						index++;
						var oDiv = document.createElement('div');
						oDiv.pos = {
							left:parseInt(iColGap + j*(iColGap + THUMB_IMG_WIDTH)),
							top:parseInt(iRowGap + i*(iRowGap + THUMB_IMG_HEIGTH))
						}
						oDiv.index = index;
						oDiv.matrix = {
							col:j,
							row:i
						}
						oDiv.style.left = (-Math.random()*300 - 200) + 'px';
						oDiv.style.top = (-Math.random()*300 - 200) + 'px';
						oDiv.className = 'img';
						oDiv.style.width = THUMB_IMG_WIDTH + 'px';
						oDiv.style.height = THUMB_IMG_HEIGTH + 'px';
						oDiv.style.background = 'url(imgshow/thumbs/'+index+'.jpg)';
						oDiv.innerHTML = '<span></span>';
						oContainer.appendChild(oDiv);
					}
				}
				var aImg = document.getElementsByClassName('img');
				setTimeout(function(){
					// for(var i=0;i<ROW;i++){
					// 	for(var j=0;j<COL;j++){
					// 		aImg[i].style.left = ''
					// 	}
						
					// }for 循环太快,,用定时器来设定
					index--;
					var timer = setInterval(function(){

						 aImg[index].style.left = aImg[index].pos.left+'px';
						 aImg[index].style.top = aImg[index].pos.top+'px';
						 setStyle3d(aImg[index],'transform','rotate('+(Math.random()*40-20)+'deg)');
						 oDiv.onclick = function(){

						 };
						 //在js中函数也是一个对象，产生内存浪费,如果函数内容一致，则采取事件委托,较为麻烦
						 aImg[index].addEventListener('click',clickHandler,false);
                         index--;
                         if(index == -1){
                         	clearInterval(timer);
                         }
					},100);

         			},0);
				function clickHandler(){
					if(bClicked){//has click regard to scatter

						for(var i=0;i<aImg.length;i++){
							 var oSpan = aImg[i].getElementsByTagName('span')[0];

							 aImg[i].style.left = aImg[i].pos.left+'px';
						     aImg[i].style.top = aImg[i].pos.top+'px'; 
						     oSpan.style.opacity = 0;
						     aImg[i].className = 'img';

						     //console.log(aImg[i].style.left);
						     setStyle3d(aImg[i],'transform','rotate('+(Math.random()*40-20)+'deg)');
						     oPrev.style.display = oNext.style.display = 'none';
						}
					}else{//regard to combine
						var bigImgPos= {
							left:(oContainer.offsetWidth - BIG_IMG_WIDTH)/2,
							top:(oContainer.offsetHeight- BIG_IMG_HEIGHT)/2
						};
						for(var i=0;i<aImg.length;i++){
							var oSpan = aImg[i].getElementsByTagName('span')[0];
							oSpan.style.background = 'url(imgshow/'+this.index +'.jpg)' + (-aImg[i].matrix.col*THUMB_IMG_WIDTH) +'px'+' '+ (-aImg[i].matrix.row*THUMB_IMG_HEIGTH)+ 'px';
							oSpan.style.opacity = 1; 

							aImg[i].style.left = bigImgPos.left + aImg[i].matrix.col * (THUMB_IMG_WIDTH+1) + 'px';
							aImg[i].style.top = bigImgPos.top + aImg[i].matrix.row * (THUMB_IMG_HEIGTH+1) + 'px';
							 setStyle3d(aImg[i],'transform','rotate(0deg)');
							 aImg[i].className = 'img piece';
						}
						oPrev.style.display = oNext.style.display = 'block';
					}
					bClicked = !bClicked;
					oPrev.onclick = oNext.onclick = function(){
					if(this == oPrev){
						iNow--;
						if(iNow == -1){
							iNow = NUM-1;
						}
					}else{
						iNow++;
						if(iNow == NUM){
							iNow = 0;
						}
					}
					var arr =[];//让数组本身就是乱的
					for(var i =0;i<NUM;i++){
						arr.push(i);
					}
					arr.sort(function(){
							return Math.random()-0.5;
						});
					var timer = setInterval(function(){
						var item = arr.pop();
						aImg[item].getElementsByTagName('span')[0].style.background = 'url(imgshow/'+(iNow+1)+'.jpg)' +(-aImg[item].matrix.col*THUMB_IMG_WIDTH) +'px'+' '+ (-aImg[item].matrix.row*THUMB_IMG_HEIGTH)+ 'px';
					},30);
				};
				};
				function setStyle3d(elem,attr,value){
					['Webkit','Moz','Ms','o',''].forEach(function(prefix){
						elem.style[prefix + attr.charAt(0).toUpperCase()+attr.substr(1)] = value;
					})
				}
			}
		})();
	</script>
</body>
</html>