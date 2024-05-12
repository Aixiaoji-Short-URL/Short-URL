<?php
    include './Configs/LanguagePacks/Engilsh/English-American.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $LanguageV1["title"]; ?></title>
    <link rel="stylesheet" type="text/css" href="./CSS/index.css">
</head>
<body>

<h1><?php echo $LanguageV1["h1"]; ?></h1>

<form method="POST" action="">
    <label for="original_url"><?php echo $LanguageV1["CC-original_url"]; ?></label>
    <input type="text" name="original_url" required>

    <label for="password"><?php echo $LanguageV1["CC-password"]; ?></label>
    <input type="text" name="password">

    <label for="diy_url"><?php echo $LanguageV1["CC-diy_url"]; ?></label>
    <input type="text" name="diy_url">

    <input type="submit" value="<?php echo $LanguageV1["Create-submit"]; ?>">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 处理表单提交

    $original_url = $_POST["original_url"];
    $password = $_POST["password"];
    $diy_url = $_POST["diy_url"];

    // 获取当前网站域名
    $current_domain = $_SERVER['HTTP_HOST'];

    // 确定协议
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";

    // 构建API请求URL
    $api_url = $protocol . $current_domain . "/addurl_api.php";
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
        echo $LanguageV1["Create-OK"] . "<p><a href='" . $protocol . $current_domain . "/i/?i={$result["diy_url"]}'>" . $protocol . $current_domain . "/i/?i={$result["diy_url"]}</a></p>";
    } else {
        echo $LanguageV1["Create-ERROR"] . "<p>{$result["msg"]}</p>";
    }
}
?>

</body>
</html>
