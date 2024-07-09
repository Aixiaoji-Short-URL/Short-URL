<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 读取现有配置文件内容
    include("../../Configs/Main/WebMainConfig.php");
    $UseLanguage = "../.." . $ConfigMain["Language"];
    include($UseLanguage);
    $LanguageVersion = "LanguageV2";
    $Edited = ${$LanguageVersion}; 

    // 更新配置数组中的值
    foreach ($_POST as $key => $value) {
        if (isset($Edited[$key])) {
            $Edited[$key] = $value;
        }
    }

    // 生成新的配置文件内容
    $configContent = "<?php\n\n\$" . $LanguageVersion . " = " . var_export($Edited, true) . ";\n\n?>";

    // 确保文件路径正确
    $filePath = $UseLanguage;
    if (file_put_contents($filePath, $configContent)) {
        echo "<p>Configuration saved successfully.</p><br><a href='javascript:history.back(-1)'>Back</a>";
    } else {
        echo "<p>Failed to save configuration.</p><br><a href='javascript:history.back(-1)'>Back</a>";
    }
}

?>
