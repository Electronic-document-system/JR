<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
	<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 连接数据库（用实际的数据库凭证替换这些变量）
    $servername = "localhost";
    $username = "root";
    $password = "liu12345";
    $dbname = "csv_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // 检查连接
    if ($conn->connect_error) {
        die("连接失败：" . $conn->connect_error);
    }

    // 处理发送者和接受者的realname
	session_start(); 
if (isset($_SESSION['realname'])) {
    $senderRealname = $_SESSION['realname'];
}
     // 你需要根据实际情况获取发送者的realname
    $receiverRealname = $_POST["to"];

    // 处理文件上传
    $uploadDir = 'upload/';  // 上传目录
    $uploadedFile = $uploadDir.$_FILES['file']['name'];
    // 处理文件密级
    $level = $_POST['level'];

    // 将文件从临时位置移动到上传目录
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadedFile)) {
        // 文件移动成功，插入文件信息到数据库
        $fileName = $_FILES['file']['name'];
        $uploadTime = date("Y-m-d H:i:s"); // 获取当前时间

        // 将信息插入数据库表 t_files
        $sql = "INSERT INTO t_files (发送者, 接受者, 文件名, 时间, 文件状态,密级) 
                VALUES ('$senderRealname', '$receiverRealname', '$fileName', '$uploadTime', '未读','$level')";

        if ($conn->query($sql) === TRUE) {
            echo "文件上传成功，文件信息已插入数据库。";
			header("Location: Document_mine.php");
        } else {
            echo "文件上传成功，但文件信息插入数据库时发生错误：" . $conn->error;
        }
    } else {
        // 文件移动失败
        echo "文件上传失败。";
    }

    // 关闭数据库连接
    $conn->close();
}
?>

</body>
</html>