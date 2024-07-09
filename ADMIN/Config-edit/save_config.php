<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 读取现有配置文件内容
    include("../../Configs/Main/WebMainConfig.php");

    // 更新配置数组中的值
    foreach ($_POST as $key => $value) {
        if (isset($ConfigMain[$key])) {
            $ConfigMain[$key] = $value;
        }
    }

    // 生成新的配置文件内容
    $configContent = "<?php\n\n\$ConfigMain = " . var_export($ConfigMain, true) . ";\n\n";
    $configContent .= "\$ConfigMainLabels = " . var_export($ConfigMainLabels, true) . ";\n\n?>";

    // 确保文件路径正确
    $filePath = "../../Configs/Main/WebMainConfig.php";
    if (file_put_contents($filePath, $configContent)) {
        echo "Configuration saved successfully.";
    } else {
        echo "Failed to save configuration.";
    }
}
?>
