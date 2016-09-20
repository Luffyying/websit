window.onload = function(){
    waterfall('container','box');
    var dataInt ={
    	'data':[{'src':'0.jpg'},{'src':'0.jpg'},{'src':'0.jpg'}
    	,{'src':'0.jpg'},{'src':'0.jpg'}]
    }
    window.onscroll = function(){
    	//judge if fit the 
    	if(checkScroll()){
    		//render
    		var oParent = document.getElementById('container');
    		for(var i=0;i<dataInt.data.length;i++){
    			var oBox = document.createElement('div');
    			oBox.className='box';
    			oParent.appendChild(oBox);
    			var oPic = document.createElement('div');
    			oPic.className = 'pic';
    			oBox.appendChild(oPic);
    			var oImg =  document.createElement('img');
    			oImg.src = 'imgshow/'+ dataInt.data[i].src;
    			oPic.appendChild(oImg);
    		}
    		waterfall('container','box');
    	}
    }
}
function waterfall(parent,box){
    var oParent = document.getElementById(parent);
    var oBoxs = getByClass(oParent,box);
    console.log(oBoxs.length);
    var oBoxW = oBoxs[0].offsetWidth;//不加border
    var cols = Math.floor(document.documentElement.clientWidth/oBoxW);
    //set the container
    oParent.style.cssText = 'width:'+ oBoxW*cols + 'px;margin:0 auto';
    var hArr = [];//set the height;
    for(var i=0;i<oBoxs.length;i++){
    	if(i<cols){
    		hArr.push(oBoxs[i].offsetHeight);
    	}else{
    		var minH = Math.min.apply(null,hArr);
    		var index = getMinhIndex(hArr ,minH);
    		oBoxs[i].style.position = 'absolute';
    		oBoxs[i].style.top = minH + 'px';
    		oBoxs[i].style.left = oBoxW * index + 'px';
    		hArr[index]+=oBoxs[i].offsetHeight;
    		//oBoxs[i].style.left = oBoxs[i].offsetWidth+ 'px';
    	}
    }
    console.log(hArr);
}
 function getByClass(parent,className){
 	var arr = [];
 	oElement = parent.getElementsByTagName('*');
 	for(var i=0;i<oElement.length;i++){
 		if(oElement[i].className ==className){
 			arr.push(oElement[i]);
 		}
 	}
 	return arr;
 }
 function getMinhIndex(arr ,val){
 	for(var i in arr){
 		if(arr[i] == val){
 			return i;
 		}
 	}
 }
 function checkScroll(){
 	var oParent = document.getElementById('container');
 	var oBoxs = getByClass(oParent,'box');
 	var lastBoxH = oBoxs[oBoxs.length-1].offsetTop + 
 	Math.floor(oBoxs[oBoxs.length-1].offsetHeight/2);
 	var scrollTop = document.body.scrollTop ||document.documentElement.
 	scrollTop;
 	var height = document.body.clientHeight ||document.documentElement.
 	clientHeight;
 	return (lastBoxH<scrollTop+ height)?true:false;
 }