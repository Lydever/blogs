$(function(e){
        	$('button[data-book-id]').bind('click' , function(e){
        		// 获取图书ID
        		let bookId = $(this).attr('data-book-id');
        		console.log(bookId);
        		// ajax请求
        		$.get('ajax/addShelf.php?bookId=' + bookId).then(function(res){
        			
        			console.log(res);
        			if(res.code == 102){
        				SZJDialog.alert({
		                	message:'用户尚未登录',
		                	callback:function(e){
		                		location.href = 'login.php';
		                	}
		            	});
		            	return;
        			}
        			let message = '添加借书架失败';
        			if(res.code == 100){
        				message = '添加借书架成功';
        			}
        			else if(res.code == 101){
        				message = '参数无效';
        			}
        			
    				SZJDialog.alert({
	                	message:message
	            	});	
        		});
        	});    
	    });