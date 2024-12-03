<?php

require_once __DIR__ . '/../app/routes/routers.php';

// Sau khi nhận được URI
$uri = $_SERVER['REQUEST_URI'];
$uri = str_replace('/CN_WEB/BTVN/BT4_MVC/public', '', $uri);  // Loại bỏ phần public nếu cần

// Hoặc bạn có thể dùng var_dump để kiểm tra chi tiết hơn


// Chuyển tiếp đến router
Router::route($uri);
?>
