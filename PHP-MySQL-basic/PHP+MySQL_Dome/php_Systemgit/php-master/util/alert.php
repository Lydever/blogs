<?php 

function showMessage($msg , $url='shelf.php'){

	echo "<script>alert('${msg}');location.href = '${url}';</script>";	

}