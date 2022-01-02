<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>shelf</title>
	<link rel="stylesheet" type="text/css" href="css/shelf.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="lib/dialog/szjDialog.css">
</head>
<body>
	

	 <div class="container">
	 	<?php 
	 		require_once('20181030/util/globalSettings.php');
			require_once('20181030/icn/header.php');
			require_once('20181030/services/shelfService.php');
			$memberId = $_SESSION[SESSION_KEY_CURRENT_USER]['id'];
			if(!array_key_exists(SESSION_KEY_CURRENT_USER , $_SESSION)){
				header('location:login.php');
				exit;
			}
			
			// print_r($getShelf); 

			// 分页
			$pageIndex = 1;
			$pageSize = 6;
			if(array_key_exists('page' , $_GET)){
				$pageIndex = $_GET['page'];
			}

			$getShelf = getShelf($memberId,$pageIndex,$pageSize);
			// print_r($getShelf);

			$rowCount = getStudentCount($memberId);
			$totalPageCount = ceil($rowCount / $pageSize);

		 ?>
		 <div class="main">

			<div class="nav clear_fix"> 
				<div><span>首页</span>&gt;借书架：<span><?php echo count($getShelf); ?> </div>
				<div onclick="history.back();">返回上一页</div>
			</div>

			<div class="tab">


			<?php if(count($getShelf) > 0 ){?>

				<table class="table-hover">
					<thead>
						<tr>
							<th>
								<input type="checkbox" id="chkAll" name="">全选
							</th>
							<th>封面</th>
							<th>书名</th>
							<th>作者</th>
							<th>出版社</th>
							<th>操作</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($getShelf as $i => $value):?>
							<tr>
								<td><input type="checkbox" name="item" data-book-id="<?php echo $value[0]; ?>"></td>
								<td>
									<img src="Images/<?php echo $getShelf[$i]['image'] ?>" onclick="location.href='detail.php?id=<?php echo $value['id'] ?>'">
								</td>

								<td><?php echo $getShelf[$i][2] ?></td> 
								<td><?php echo $getShelf[$i]['name'] ?></td>
								<td><?php echo $getShelf[$i][9] ?></td>
								<!-- <td><a  class="btn btn-default" href="deleteShelf.php?Id=<?php echo $getShelf[$i]['id'] ?>"><i class="fa fa-trash-o"></i> 移除</a></td> -->
								<td><a class="btn btn-default"  data-book-id="<?php echo $value[0]; ?>"><i class="fa fa-trash-o"></i> 移除</a></td>
							
							</tr>
							
						<?php endforeach ?>

						
					</tbody>
					<tfoot>
						<tr>
							<!-- <td colspan="3"><a  class="btn btn-default" href="deleteShelfAll.php"><i class="fa fa-trash-o"></i> 移除选中图书</a></td> -->
							<td colspan="3"><a  class="btn btn-default" id="btnSubmit"><i class="fa fa-trash-o"></i> 移除选中图书</a></td>
							<td colspan="3"><a  class="btn btn-danger" href="submit.php"><i class="fa fa-check-square-o"></i> 借阅选中图书</a></td>
						</tr>
					</tfoot>
				</table>
				
				<?php }else{ ?>

					<div>
						<div class="notBook">借书架为空，<a href="list.php">去逛逛</a></div>
						<img src="image/111.jpg" width="1080px" height="720px">
					 	
					 </div>
					
			<?php } ?>				
			</div>

		 	 <div class="page">
		 		<ul id="page">
				<?php for($i = 0 ; $i < $totalPageCount; $i++){ ?>
					<li class="<?php echo $pageIndex==($i + 1) ? 'active' : '' ?>" onclick="location.href='shelf.php?page=<?php echo $i + 1; ?>'"><?php echo $i + 1; ?></li>
				<?php } ?>

				</ul>
		 	</div>
		 </div>
		 <?php 
			require_once('20181030/icn/footer.php');
		 ?>

	 </div>
	<script src="lib/js/jquery.min.js"></script>
	<script src="lib/dialog/szjDialog.js"></script>
	<script type="text/javascript">
		$(function(e){
			// 移除单个
			$('a[data-book-id]').bind('click' , function(e){
				let $self = $(this);
				// console.log($self);
				let bookId = $self.attr('data-book-id');
				// console.log(bookId);

				
				$.get('ajax/removeShelf.php?bookId=' + bookId).then(function(res){
        			// console.log($self);console.log(bookId);
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

        			let message = '删除失败';
        			if(res.code == 100){
        				message = '删除成功';
        				$self.parent().parent().remove();

        				if ($("tbody[button]").length == 0) {
        					SZJDialog.alert({
			                	message:'删除成功',
			                	callback:function(e){
			                		location.href = 'shelf.php';
			                	}
			            	});
        				}
        			}

        			


        			else if(res.code == 101){
        				message = '参数无效';
        			}
        			
    				SZJDialog.alert({
	                	message:message
	            	});	
        		});
			});



			// 复选框全选反选

			$('#chkAll').bind('click' , function(){
				$('tbody :checkbox').prop('checked' , this.checked);
			});
				
			let $chk = $("input[name = 'item']");
			
			$chk.bind('click',function(){
				$(this).prop('checked',this.checked);
				if($('tbody :checked').length == $chk.length) {
					$('#chkAll').prop('checked',this.checked);
				}
				else{
					$('#chkAll').prop('checked',false);
				}
			})


			


			// 选中移除
			$('#btnSubmit').bind('click' , function(e){
				let bookIds = null;
				$('tbody :checked').each(function(index , item){
					let id = $(item).attr('data-book-id');
					if(bookIds){
						bookIds = bookIds + ',' + id;
					}
					else{
						bookIds = id;
					}
					
				});

				$.get('ajax/removeCheckShelf.php' , {ids: bookIds}).then(function(res){

					if(res.code == 102){
        				SZJDialog.alert({
		                	message:'用户尚未登录',
		                	callback:function(e){
		                		location.href = 'login.php';
		                	}
		            	});
		            	return;
        			}

        			let message = '删除失败';

        			if(res.code == 100){
        				message = '删除成功';
        				$('span').text($('span').text() - res.data);
        				$('tbody :checked').parent().parent().remove();
        				
        				if ($("tbody[button]").length == 0) {
        					SZJDialog.alert({
			                	message:'删除成功',
			                	callback:function(e){
			                		location.href = 'shelf.php';
			                	}
			            	});
        				}

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
	</script>
</body>
</html>