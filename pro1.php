<?php
// 数据库连接配置
$host = 'rm-wz92814fppe3065l1oo.mysql.rds.aliyuncs.com';
$dbname = 'aishide';
$username = 'root';
$password = 'RootAmy!@';

// 创建数据库连接
$link = mysqli_connect($host, $username, $password, $dbname);

// 检查连接是否成功
if (!$link) {
    die('连接失败: ' . mysqli_connect_error());
}

// 查询所有产品的 ID 和名称
$query = "SELECT id, product_name FROM products";
$result = mysqli_query($link, $query);

// 初始化空数组
$products = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row; // 添加到数组中
    }
}

// 设置响应头为 JSON 格式
header('Content-Type: application/json');
echo json_encode($products);

// 关闭数据库连接
mysqli_close($link);

