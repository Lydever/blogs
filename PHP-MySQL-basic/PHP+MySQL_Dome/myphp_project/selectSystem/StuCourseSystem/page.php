<?php
function page($total,$page,$page_current,$url){
    $total = ceil($total/$page);
    $page_previous = ($page_current<=1)?:$page_current-1;
    $page_next = ($page_current>=$total)?$total:$page_current+1;
    $navigator = "<a href=$url?page_current=$page_current=$page_previous>上一页</a>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    for ($i=1;$i<$total;$i++){
        $navigator.="<a href='$url?page_current=$i'>$i</a>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    $navigator."<a href=$url?page_current=$page_next>下一页</a></br>";
    $navigator.="共".$total."条记录,&nbsp共".$total."页,&nbsp当前是第".$page_current."页";
    echo $navigator;
}
?>

