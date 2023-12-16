<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">

    <title>欢迎！</title>
    <!-- 引入字体图标 -->
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar">
        <input type="checkbox" id="checkbox">
        <label for="checkbox">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </label>
        <ul>
            <li>
                <img src="login.jpg" alt="">
                <span>欢迎您！<?php
					session_start(); 
if (isset($_SESSION['realname'])) {
    $realname = $_SESSION['realname'];
	$role=$_SESSION['role'];
    echo  $realname;
} else {
    echo "请先登录";
}
	?></span>
            </li>
            <li>
                <a href="welcome.php">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span>后台首页</span>
                </a>
            </li>
            <li>
                <a href="Department_management.php">
                    <i class="fa fa-sitemap" aria-hidden="true"></i>
                    <span>部门管理</span>
                </a>
            </li>
            <li>
                <a href="user_management.php">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <span>用户管理</span>
                </a>
            </li>
            <li>
                <a href="Document_mine.php">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    <span>公文处理</span>
                </a>
            </li>
            <li>
                <a href="index.php">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    <span>退出登录</span>
                </a>
            </li>
        </ul>
        <div class="main">
            <?php
//创建连接
$conn = new mysqli('localhost','root','liu12345','csv_db');
//检测连接
if($conn->connect_error){
    die('连接失败：'.$conn->connect_error);
}
	
 // 查询数据
$sql = "SELECT * FROM t_department";
$result = $conn->query($sql);
// 在部门名字列中显示可编辑的输入框

// 显示数据
if ($result->num_rows > 0) {
    echo "<table><tr><th>部门&nbsp&nbsp</th><th>密级&nbsp&nbsp</th><th>成员数&nbsp&nbsp</th><th>管理人&nbsp&nbsp</th></tr>";
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["部门"]."</td><td>".$row["密级"]."</td><td>".$row["成员数"]."</td><td>".$row["管理人"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 结果";
}

// 关闭连接
$conn->close();
?>
        </div>
    </div>
</body>

</html>
