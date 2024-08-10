<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include("../../Configs/Main/WebMainConfig.php");
    $UseLanguage = "../.." . $ConfigMain["Language"];
    include($UseLanguage);

    // 获取所有的语言包变量
    $languageVars = array_filter(
        get_defined_vars(),
        function($key) {
            return preg_match('/^LanguageV\d+$/', $key);
        },
        ARRAY_FILTER_USE_KEY
    );

    // 更新语言包
    foreach ($languageVars as $langVersion => $langArray) {
        if (isset($_POST[$langVersion])) {
            foreach ($_POST[$langVersion] as $key => $value) {
                if (isset($languageVars[$langVersion][$key])) {
                    $languageVars[$langVersion][$key] = $value;
                }
            }
        }
    }

    // 生成新的配置文件内容
    $configContent = "<?php\n\n";
    foreach ($languageVars as $langVersion => $langArray) {
        $configContent .= "\${$langVersion} = " . var_export($langArray, true) . ";\n\n";
    }
    $configContent .= "?>";

    if (file_put_contents($UseLanguage, $configContent)) {
        echo "<p>Configuration saved successfully.</p><br><a href='javascript:history.back(-1)'>Back</a>";
    } else {
        echo "<p>Failed to save configuration.</p><br><a href='javascript:history.back(-1)'>Back</a>";
    }
}
?>
