<?php
// 数据库连接配置
$host = 'rm-wz92814fppe3065l1oo.mysql.rds.aliyuncs.com'; 
$dbname = 'aishide'; 
$username = 'root'; 
$password = 'RootAmy!@'; 

// 创建数据库连接
$link = mysqli_connect($host, $username, $password, $dbname);

// 检查连接是否成功
if ($link) {
    $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($product_id > 0) {
        $query = "SELECT product_code, product_name, brand, package_size, batch_number, production_date, image_url FROM products WHERE id = $product_id";
        $result = mysqli_query($link, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_assoc($result);
            ?>

            <div class="van-row">
                <div class="van-col">
                    <div class="label">产品代号</div>
                    <div class="value"><?php echo htmlspecialchars($product['product_code']); ?></div>
                </div>
            </div>
            <div class="van-row">
                <div class="van-col">
                    <div class="label">产品名称</div>
                    <div class="value"><?php echo htmlspecialchars($product['product_name']); ?></div>
                </div>
            </div>
            <div class="van-row">
                <div class="van-col">
                    <div class="label">品牌</div>
                    <div class="value"><?php echo htmlspecialchars($product['brand']); ?></div>
                </div>
            </div>
            <div class="van-row">
                <div class="van-col">
                    <div class="label">包装规格</div>
                    <div class="value"><?php echo htmlspecialchars($product['package_size']); ?></div>
                </div>
            </div>
            <div class="van-row">
                <div class="van-col">
                    <div class="label">生产批号</div>
                    <div class="value"><?php echo htmlspecialchars($product['batch_number']); ?></div>
                </div>
            </div>
            <div class="van-row">
                <div class="van-col">
                    <div class="label">生产日期</div>
                    <div class="value"><?php echo htmlspecialchars($product['production_date']); ?></div>
                </div>
            </div>

            <?php
        } else {
            echo "<p>未找到对应的产品信息</p>";
        }

        mysqli_free_result($result);
    } else {
        echo "<p>无效的产品ID</p>";
    }
} else {
    echo "连接失败";
}

// 关闭数据库连接
mysqli_close($link);
