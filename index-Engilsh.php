<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Long or Short URL (open source)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            color: #333;
        }
    </style>
</head>
<body>

<h1>Long or Short URL (open source)</h1>

<form method="POST" action="">
    <label for="original_url">Original URL：</label>
    <input type="text" name="original_url" required>

    <label for="password">Password：</label>
    <input type="text" name="password">

    <label for="diy_url">DIY URL：</label>
    <input type="text" name="diy_url">

    <input type="submit" value="GO! GO! GO! Create Long or Short URL">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 处理表单提交

    $original_url = $_POST["original_url"];
    $password = $_POST["password"];
    $diy_url = $_POST["diy_url"];

    // 获取当前网站域名
    $current_domain = $_SERVER['HTTP_HOST'];

    // 构建API请求URL
    $api_url = "https://" . $current_domain . "/addurl_api.php";
    $api_url .= "?original_url=" . urlencode($original_url);

    // 添加密码参数
    if (!empty($password)) {
        $api_url .= "&password=" . urlencode($password);
    }

    // 添加自定义URL参数
    if (!empty($diy_url)) {
        $api_url .= "&diy_url=" . urlencode($diy_url);
    }

    // 使用cURL发送GET请求
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    // 解析JSON响应
    $result = json_decode($response, true);

    // 处理响应
    if ($result["code"] == 1) {
        echo "<p>Long URL： <a href='https://" . $current_domain . "/i.php?i={$result["diy_url"]}'>https://" . $current_domain . "/i.php?i={$result["diy_url"]}</a></p>";
    } else {
        echo "<p>Error creating long URL：{$result["msg"]}</p>";
    }
}
?>

</body>
</html>
