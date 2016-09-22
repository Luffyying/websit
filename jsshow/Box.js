define(['jquery'],function($){
     function Box(){

     }
     Box.prototype.init=function(options){
     	var _that = this;
	     	var setting={
	     		width:300,
	     		height:200
	     	}
	     	setting = $.extend(setting,options);
	     	this.$container = $('<div class="dialog-container"></div>');
			this.$mask = $('<div class="dialog-mask"></div>');
			this.$box = $('<div class="dialog-box"></div>');
			this.$titlebox = $('<div class="dialog-title-box"></div>');
			this.$title = $('<span class="dialog-title"></span>');
			this.$closebtn = $('<span class="dialog-close-btn">[X]</span>');
			this.$content = $('<div class="dialog-content"></div>');
			this.$container.append(this.$mask);
			this.$box.css({
				width: setting.width,
				height: setting.height,
				marginLeft: -setting.width/2,
				marginTop: -setting.height/2
			}).appendTo(this.$container);
			this.$title.html(setting.title).appendTo(this.$titlebox);
			this.$closebtn.on('click', function(){
				_that.close();
			}).appendTo(this.$box);
			this.$titlebox.appendTo(this.$box);
			this.$content.appendTo(this.$box);
			//this.$content.load(setting.url).appendTo(this.$box);
			this.$mask.on('click', function(){
				_that.close();
			});
			$(document.body).append(this.$container);

     }
     	Box.prototype.close = function(){
		this.$container.remove();
	}
     return Box;


});