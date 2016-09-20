<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<base href="<?php echo site_url();?>" />
	<link rel="stylesheet" type="text/css" href="cssshow/style2.css">
</head>
<body>
	<div id="container">
		<div id="header">
			<h2>Slicebox - 3D 图片滑块效果</h2>
			<hr align=center style="border:2 solid #000"  width="50%" size=1/><br/><br/>
		</div>
		<div id="menu">
			<ul id="ways">
				<li style="margin-left:480px;"><a class='a'>效果一</a></li>
				<li><a class='a'>效果二</a></li>
				<li><a class='a'>效果三</a></li>
				<li><a class='a'>效果四</a></li>
			</ul>
		</div>
		<div id="wrapper">
		    <button  id="next" type="">&gt;</button>
			<div id="img">
				<img src="http://localhost/915/imgshow/1.jpg" alt="">
			</div>
			<button  id="prev" type="">&lt;</button>
			<div id="shadow">
				
			</div>
		</div>
		<script>
		//create the class of slicebox
		//(function(){
			function Slicebox(pos,index){
                 this.pos = pos;
                 this.container;
                 this.index = index;//note the number of the box
                       
			}
            Slicebox.prototype.init = function(){
                 	var oContainer = document.createElement('div');
					var oshow = document.getElementById('img');
					oContainer.className = 'img';
					this.container = oContainer;
					oshow.appendChild(oContainer);
					oContainer.style.left = this.pos + 'px';
					for(var i=0;i<6;i++){
						var oDiv = document.createElement('div');
						oDiv.className = 'cube '+'n'+(i+1) + ' '+ 'p' + (this.index);
						oContainer.appendChild(oDiv);
					}					
            }
            //select the options
            var a = [];
            var p = null;
		    var flag = 0;
			var oUl = document.getElementById('ways');
		    var ali = oUl.children;
		    for(var i=0;i<ali.length;i++)
		    {
		    	ali[i].index = i;
		    	ali[i].onmouseover = function(){
		    		for(var k=0;k<ali.length;k++){
		    			ali[k].className = '';
		    		}
		    		ali[this.index].className = 'ch';
		    
		    	}
		    	ali[i].onmouseout = function(){
		    		ali[this.index].className = '';
		    	}
		    	ali[i].onclick = function(){//has a problem
                   flag = this.index;
		           }
		    }
            function show(){            	
            	var arr = [];
            	for(var i=0;i<5;i++){
            	a[i] = new Slicebox(10 + 140*i ,i+1);
		        a[i].init(); 
		      }
		    }
	//prove from here!!!

			if(flag == 0){
                 	p = 'X';
			}else if(flag == 1){
				 	p = 'Y';
			}
			var count1 = 1,count2 = 1;
			var page1 = 0,
			page2=0 ;
            var next = document.getElementById('next');  
            var prev = document.getElementById('prev');  
		    next.onclick = function(){
                count2 = 1;
		      	page1 = page2+(count1*90);
			    var timer;
				var indexk = 0;
					      //clearInterval(timer);
		      	timer = setInterval(function(){
		      	a[indexk].container.style.WebkitTransform = 'rotate'+p+'('+page1+'deg)';	
		      	indexk++;
		      	if(indexk==5){
		      		 clearInterval(timer);
		      	}
		      		 	
		      	},300);		      		 	 
		      	count1++;
		      	}
		    prev.onclick = function(){
		      	count1 = 1;
		      	page2 = page1-(90*count2);
				var timer;
			    var indexk = 0;
		      	timer = setInterval(function(){
		      	a[indexk].container.style.WebkitTransform = 'rotate'+p+'('+page2+'deg)';	
		      	indexk++;
		        if(indexk==5){
		      		 clearInterval(timer);
		      		 	}
		      		 	
		      	},300);
		      	count2++;

		      	}
		      		//}
	//load the pictures	      		
            var index = 0;
            for(var i=0;i<6;i++){
            	var oImg = new Image();
            	oImg.src = "imgshow/" + (i+1) + '.jpg';
            	oImg.onload = function(){
            		if(++index == 6){
            			show();
            		}
            	}
            }          
		//})();			
		</script>
</body>
</html>