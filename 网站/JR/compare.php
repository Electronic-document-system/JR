<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>check</title>
</head>

<body>

<meta charset="utf-8">
	
<?php
//创建连接
$conn = new mysqli('localhost','root','liu12345','csv_db');
//检测连接
if($conn->connect_error){
    die('连接失败：'.$conn->connect_error);
}
	
 $username = $_POST["username"];
 $password = $_POST["password"];
 $query = "SELECT * FROM `t_user` WHERE username = '$username'";
 $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    // 检查密码
    $row = mysqli_fetch_assoc($result);
    if ($row["password"] == $password) {
      // 密码匹配
	$realname = $row["realname"];
	$role = $row["role"];
	session_start();
    $_SESSION['realname'] = $realname; // 将真实姓名存储到 $_SESSION 变量中
	$_SESSION['role'] = $role;
			 header('Location: welcome.php');
		exit (1);
    } else {
      // 密码不匹配
      echo "密码错误";
    }
  } else {
    // 用户不存在
    echo "该用户不存在，请联系管理员注册";
  }
  // 关闭数据库连接
  mysqli_close($conn);
	   
?>
</body>
</html>