<?php
include("../Configs/Main/WebMainConfig.php");
$UseLanguage = "..".$ConfigMain["Language"];
include($UseLanguage);
?>

<?php
header('Content-Type: text/html; charset=utf-8');

// 读取JSON文件
// Read JSON file
function readJSON($file_path) {
    $json_content = file_get_contents($file_path);
    $data = json_decode($json_content, true);
    return $data;
}

// 重定向到原始URL
// Redirect to original URL
function redirectToOriginalURL($original_url) {
    echo "<meta http-equiv='refresh' content='0;url={$original_url}'>";
    echo "您即将跳转 - You are about to jump to {$original_url}";
}

// 显示错误信息
// Display error message
function displayError($message) {
    echo "<p style='color: red;'>{$message}</p>";
}

$i = isset($_GET['i']) ? $_GET['i'] : '';

if (empty($i)) {
    displayError('Error: Parameter "i" is not specified');
} else {
    $cans_data = readJSON('../url.json');

    $matched = false;
    foreach ($cans_data as $row) {
        if ($row['diy_url'] == $i) {
            $matched = true;

            if ($row['password'] == 'no_password') {
                redirectToOriginalURL($row['original_url']);
            } else {
                
                include("..".$ConfigMain["Theme"]."/themeconfig.php");
                include("..".$ConfigMain["Theme"].$ThemeConfigMainUIpath["i.php-UI"]);// Include UI file
                
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $entered_password = isset($_POST['password']) ? $_POST['password'] : '';
                    if ($entered_password == $row['password']) {
                        redirectToOriginalURL($row['original_url']);
                    } else {
                        displayError('Error: Please re-enter the correct password');
                    }
                }
            }

            break;
        }
    }

    if (!$matched) {
        displayError('404 Does not have a specified URL');
    }
}
?>