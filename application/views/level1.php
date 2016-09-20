<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<base href="<?php echo site_url()?>">
	<link rel="stylesheet" type="text/css" href="cssshow/style4.css">
</head>
<body>
	<div id="container">
		<div id="ground">
			
		</div>
		<div id="brand">
			<div id="brand-ad">
				You are lucky for playing my little game!
			</div>
			<div id="brand-con">
				<button id="start">start</button>
				<button id="pause">pause</button>
			</div>
		</div>
	</div>
	<script>
	//the object of the ground
		var ground = {
			dom:document.getElementById('ground'),//make a connection between dom and the ground which you design by yourself.
			createFood:function(){
				return new Food;
			}
		};
	//the object of the snake
		var snake = {
			speed:300,
			direction:'right',
			body:[],
			eat:function(){
				ground.food.dom.className = 'block snake-block';
				ground.food.dom.style.left = this.head.offsetLeft + 'px';
				ground.food.dom.style.top = this.head.offsetTop + 'px'; 
				this.head.style.left = this.nextpos.ileft + 'px';
				this.head.style.top = this.nextpos.itop + 'px';
			 	this.body.splice(1,0,ground.food.dom);
			 	ground.food = ground.createFood();
			},
			move:function(){
		    this.head =this.body[0];//the head 
			if(this.direction == 'right'){
				this.nextpos ={
            		ileft:this.head.offsetLeft + 20,
            		itop:this.head.offsetTop
            	};
			}else if(this.direction == 'left'){
				this.nextpos ={
            		ileft:this.head.offsetLeft - 20,
            		itop:this.head.offsetTop
            	};
			}else if(this.direction == 'top'){
				this.nextpos ={
            		ileft:this.head.offsetLeft,
            		itop:this.head.offsetTop - 20
            	};
			}else if(this.direction == 'down'){
				this.nextpos ={
            		ileft:this.head.offsetLeft,
            		itop:this.head.offsetTop + 20
            	};
			}
			if(this.nextpos.ileft == ground.food.pos.left && this.nextpos.itop == ground.food.pos.top){
			 	snake.eat();
			}else{
			for(var i=0;i<this.body.length;i++)//60 40 20
			{	
					 var nowpos ={
						ileft:this.body[i].offsetLeft,
						itop:this.body[i].offsetTop
					};
					this.body[i].style.left =this.nextpos.ileft + 'px';
					this.body[i].style.top =this.nextpos.itop + 'px';
					this.nextpos = nowpos;
			}	
		     }
		      //judge if eat yourself
			 if(this.body.length>4){
			 for(var i =4;i<this.body.length;i++){
        	 if(this.body[i].offsetLeft == this.head.offsetLeft &&this.body[i].offsetTop ==this.head.offsetTop){
        		this.die();
        		}
             }
        	}
        //judge if crash the wall
	         for(var i =0;i<this.body.length;i++){
	        	if(this.body[i].offsetLeft<0 || this.body[i].offsetLeft > 980 || this.body[i].offsetTop < 0 || this.body[i].offsetTop >480)
	        	{
	        		this.die();
				}	
	         }	
       
			},
			die:function(){

                alert('Game over!');
				clearInterval(game.timer);
			}
		};

	//the food is a kind of the class！！！
		// function Food(){
		// 	kind:[1,2,3];//the kind of the food
		// };
		var Food = function(){
			do{
				var k =1;
				//var flag = true;
				this.pos ={
					left:parseInt(Math.random()*50) *20,
					top:parseInt(Math.random()*25) *20
				};
				for(var i=0;i<snake.body.length;i++)
				{
					if(snake.body[i].offsetLeft ==this.pos.left && snake.body[i].offsetTop ==this.pos.top)
					{
						//flag =false;
						k=0;
					}
				}
			}while(!k)//!flag);
			this.dom = document.createElement('div');
			this.dom.className = 'block food';
			this.dom.style.left = this.pos.left +'px';
			this.dom.style.top = this.pos.top + 'px';
		    ground.dom.appendChild(this.dom);
		}
		
	//the object of the  game want be initial and control
		var game ={
			timer:null,
			init:function(){
    //create the snake and the food
    		var snakebody = [];
			for(var i=0;i<3;i++)
			{
				var oDiv = document.createElement('div');
				oDiv.className = 'block snake-block';
				oDiv.style.left= (3-i)*20+'px';
				ground.dom.appendChild(oDiv);
				snake.body.push(oDiv);
			}
			//snake.head = snake.body[0];

			//bind the keydown for the documnet

		document.onkeydown = function(e){
			e = e || window.event;
			var keyCode = e.which || e.keyCode;
			if(keyCode == 37 && snake.direction != 'right'){
				snake.direction = 'left';
			}else if(keyCode == 38 && snake.direction != 'down'){
				snake.direction = 'top';
			}else if(keyCode == 39 && snake.direction != 'left'){
				snake.direction = 'right';
		    }else if(keyCode == 40 && snake.direction != 'top'){
		    	snake.direction = 'down';
		    }
		    snake.move();
		}
	//create the food
			ground.food = ground.createFood();//make a attribute ,food ,for the ground
			var oStart = document.getElementById('start');
				oStart.onclick = function(){
			    game.start();
			}
			var oPause = document.getElementById('pause');
				oPause.onclick = function(){
			    game.pause();
			}
			},
	//start
			start:function(){
				game.timer = setInterval(function(){
				snake.move();
				},snake.speed);
			},
	//pause
			pause:function(){
				clearInterval(game.timer);
			}
		};
		game.init();
	</script>
</body>
</html>