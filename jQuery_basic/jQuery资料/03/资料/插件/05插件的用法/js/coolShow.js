/*
* coolShow  1.0 
* Copyright (c) 2015 XiaoWangZi
* 使用 coolShow 快速制作酷炫轮播
*/
(function($){
	$.fn.coolShow = function(options){
		/*     初始化参数     */
		var defaults = {
			imgSrc:'',
			speed:50
		};
		var action = {
			init:function(){
				$('#handBar').find('span').on('click',function(){
					$(this).stop();
					$('#coolShow b').remove();
					/*     生成图片的载体    */
					for (var i = 0;i<($("#coolShow").height()/10);i++) $('#coolShow').append('<b></b>');
					/*     图片显示特效    */
					var psn = 0;
					var imgId = $(this).children().data('img');
					$('#coolShow b').each(function(){
						$(this).css({
							opacity:0,
							backgroundPosition:"0 "+psn+"px",
							backgroundImage:'url("'+options.imgSrc[imgId]+'")'
						});
						psn -= 10;
					});
					var time = 0;
					$('#coolShow b').each(function(){
						$(this).delay(time).animate({opacity:"1"},500);
						time += options.speed;
					});
				});
			}
		};
		/*     代码开始     */
		return this.each(function(){
			/*     接收传参     */
			options = (options)?$.extend(defaults,options):defaults;
			/*     生成按钮的载体    */
			for (var i = 0;i<options.imgSrc.length;i++) $('#handBar').append('<span><img src = "'+options.imgSrc[i]+'" data-img = "'+i+'"/></span>');
			/*     特效开始    */
			action.init();
		});
	};
})(jQuery);