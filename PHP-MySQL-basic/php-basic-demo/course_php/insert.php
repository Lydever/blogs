 
<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <title>添加</title>  
</head>
<body>

<script language="javascript">
  function check(form){
    if (form.cid.value="") {
      alert("请输入课程号!");
      form.cid.focus();
      return false;
    }
     if (form.cname.value="") {
      alert("请输入课程名!");
      form.cname.focus();
      return false;
    }
     if (form.xfen.value="") {
      alert("请输入学分!");
      form.xfen.focus();
      return false;
    }
     if (form.xshu.value="") {
      alert("请输入学时数!");
      form.xshu.focus();
      return false;
    }
  }
</script>

<form action="insert2.php" method="post">  
  <p>请输入课程信息:</p>
    <label>课程号：</label><input type="text" name="cid" id="cid" />  
    <label>课程名：</label><input type="text" name="cname" id="cname" />  
    <label>学分：</label><input type="text" name="xfen" id="xfen">  
    <label>学时数：</label><input type="text" name="xshu" id="xshu" /> 
    <input type="submit" value="添加" onClick="return check(form);"/>  
</form> 
</body>  
</html>