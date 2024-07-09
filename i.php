<?php

// 获取所有GET参数
$params = $_GET;

// 将参数转换为URL查询字符串
$query_string = http_build_query($params);

// 重定向到目标页面，并附带上所有参数
header('Location: ./i?' . $query_string);
exit;
?>