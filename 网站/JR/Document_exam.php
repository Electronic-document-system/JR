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
           <nav class="horizontal-nav">
			<a href="Document_mine.php" class="nav-link">我的&nbsp&nbsp&nbsp&nbsp</a>
			<a href="Document_exam.php" class="nav-link">审批&nbsp&nbsp&nbsp&nbsp</a>
			<a href="Document_write.php" class="nav-link">草拟&nbsp&nbsp&nbsp&nbsp</a>
			<a href="#" class="nav-link">归档</a>
		</nav>
        </div>
    </div>
	<nav class="under-horizontal-nav">
			<?php
session_start(); // 启动会话

// 替换以下变量为你的数据库连接信息
$servername = "localhost";
$username = "root";
$password = "liu12345";
$dbname = "csv_db";

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("数据库连接失败: " . $conn->connect_error);
}

// 获取当前用户
if (isset($_SESSION['realname'])) {
    $currentUser = $_SESSION['realname'];

    // 查询数据库以获取接收者为当前用户、文件状态为未读的文件
    $sql = "SELECT * FROM t_files WHERE 接受者 = '$currentUser' AND 文件状态 = '未读'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // 输出表头
        echo "<table border='1'>
                <tr>
                    <th>文件名</th>
                    <th>发送者</th>
                    <th>状态</th>
					<th>密级</th>
                    <th>操作</th>
					<th>时间</th>
                </tr>";

        // 输出数据
        while ($row = $result->fetch_assoc()) {
			$file=$row["文件名"];
            echo "<tr>
                    <td>" . $row["文件名"] . "</td>
                    <td>" . $row["发送者"] . "</td>
                    <td>" . $row["文件状态"] . "</td>
					<td>" . $row["密级"] . "</td>
                    <td><a href='upload/$file' download>下载</a>
					<a href='update_status.php?file=$file&status=已读'>已读</a> |
                                <a href='update_status.php?file=$file&status=退回'>退回</a>
					</td>
					<td>" . $row["时间"] . "</td>
                  </tr>";
        }

        // 输出表尾
        echo "</table>";
    } else {
        echo "没有未读文件";
    }
} else {
    echo "请先登录";
}

// 关闭数据库连接
$conn->close();
?>

		</nav>
</body>

</html>