<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		*{
			margin:0;
			padding: 0;
		}
        .content{
        	margin:0 auto;
        }
		.list1{
			width:300px;
			height: 300px;
			background-color:#e4e3e3;
			margin: 0 auto;
			float: left;
			margin-right: 30px;
		}
		.list1 ul{
			list-style-type: none;
			margin-left: 30px;
		}
		.list1 ul li{
			margin: 10px 0px;
			list-style: none;
		}
		.list1 ul li a{
			color: #114a80;
			text-decoration: none;
		}
		h3{
			margin-left: 30px;
			padding-top: 15px;
			color: #0b2b6d;
		}
		.list2{
			height: 500px;
		}
	</style>
</head>
<body>
	
<div class="content">
	<p>截取前:</p>
		<div class="list1 list2">
		<h3>集团新闻>></h3>
		<ul class="myul">
			<li><a href="#"><?php echo '1.华为在2020突破性荣获八大奖项，含五项金奖' ?></a></li>
			<li><a href="#"><?php echo '2.数字能源为智能世界提供绿色源动力' ?></a></li>
			<li><a href="#"><?php echo '3.5G超级现场首秀华为联合推出基于5G的智慧场馆' ?></a></li>
			<li><a href="#"><?php echo '4.华为发布全新一代存储Pacific系列，打造海量数据存储新标杆' ?></a></li>
			<li><a href="#"><?php echo '5.华为AR502H物联网关荣获2020东京Best of Show Award金奖' ?></a></li>
			<li><a href="#"><?php echo '6.为发布全新一代OceanStor存储Pacific系列，打造海量数据存储新标杆' ?></a></li>
			<li><a href="#"><?php echo '7.为AR502H物联网关荣获2020Interop东京金奖' ?></a></li>
		</ul>
	</div>
	<p>截取后:</p>
		<div class="list1">
		<h3>集团新闻>></h3>
		<ul class="myul">
			<li><a href="#"><?php $str = new subStr(); echo $str->subtext('1.华为在2020突破性荣获八大奖项，含五项金奖',15); ?></a></li>
			<li><a href="#"><?php $str2 = new subStr(); echo $str2->subtext('2.数字能源为智能世界提供绿色源动力',15); ?></a></li>
			<li><a href="#"><?php $str3 = new subStr(); echo $str3->subtext('3.5G超级现场首秀华为联合推出基于5G的智慧场馆',15); ?></a></li>
			<li><a href="#"><?php $str4 = new subStr(); echo $str4->subtext('4.华为发布全新一代存储Pacific系列，打造海量数据存储新标杆',15); ?></a></li>
			<li><a href="#"><?php $str5 = new subStr(); echo $str5->subtext('5.华为AR502H物联网关荣获2020东京Best of Show Award金奖 ',15); ?></a></li>
			<li><a href="#"><?php $str6 = new subStr(); echo $str6->subtext('6.华为发布全新一代OceanStor存储Pacific系列，打造海量数据存储新标杆',15); ?></a></li>
			<li><a href="#"><?php $str7 = new subStr(); echo $str7->subtext('7.华为AR502H物联网关荣获2020Interop东京金奖 ',15); ?></a></li>
		</ul>
	</div>
</div>

<?php 
    
class subStr{
	    function subtext($string,$length){
          if (mb_strlen($string,'utf-8')>$length) {
    		    return mb_substr($string,0,$length,'utf8').'...';
    	   }else{
    		     return $string;
    	   }
    }

}

?>
</body>
</html>