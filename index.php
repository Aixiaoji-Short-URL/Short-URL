<?php
include("./Configs/Main/WebMainConfig.php");
$UseLanguage = ".".$ConfigMain["Language"];
include($UseLanguage);
?>

<?php
include(".".$ConfigMain["Theme"]."/themeconfig.php");
include(".".$ConfigMain["Theme"].$ThemeConfigMainUIpath["index.php-UI"]);
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 处理表单提交

    $original_url = isset($_POST["original_url"]) ? htmlspecialchars($_POST["original_url"]) : '';
    $password = isset($_POST["password"]) ? htmlspecialchars($_POST["password"]) : '';
    $diy_url = isset($_POST["diy_url"]) ? htmlspecialchars($_POST["diy_url"]) : '';

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
        echo htmlspecialchars($LanguageV1["Create-OK_index"]) . "<p><a href='" . htmlspecialchars($protocol . $current_domain . "/i/?i={$result["diy_url"]}") . "'>" . htmlspecialchars($protocol . $current_domain . "/i/?i={$result["diy_url"]}") . "</a></p>";
    } else {
        echo htmlspecialchars($LanguageV1["Create-ERROR_index"]) . "<p>" . htmlspecialchars($result["msg"]) . "</p>";
    }
}
?>
