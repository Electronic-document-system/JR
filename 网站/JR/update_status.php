<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
	<?php
session_start();

if (isset($_SESSION['realname'])) {
    $currentUser = $_SESSION['realname'];

    if (isset($_GET['file']) && isset($_GET['status'])) {
        $file = $_GET['file'];
        $status = $_GET['status'];

        // Replace the following database connection code with your own
        $servername = "localhost";
        $username = "root";
        $password = "liu12345";
        $dbname = "csv_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("数据库连接失败: " . $conn->connect_error);
        }

        // Update the file status in the t_files table
        $updateSql = "UPDATE t_files SET 文件状态 = '$status' WHERE 文件名 = '$file' AND 接受者 = '$currentUser'";
        $conn->query($updateSql);

        // Redirect back to the main page
        header("Location: Document_mine.php");
        exit();
    }
}
?>

</body>
</html>