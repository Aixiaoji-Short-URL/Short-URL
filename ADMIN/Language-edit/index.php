<?php
include("../../Configs/Main/WebMainConfig.php");
$UseLanguage = "../..".$ConfigMain["Language"];
include($UseLanguage);

// 获取所有的语言包变量
$languageVars = array_filter(
    get_defined_vars(),
    function($key) {
        return preg_match('/^LanguageV\d+$/', $key);
    },
    ARRAY_FILTER_USE_KEY
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title> 
    <link rel="stylesheet" href="../Resource-File/MDUI/main/mdui.min.css"> 
    <script src="../Resource-File/MDUI/main/mdui.min.js"></script>
</head>
<body>
    <?php include '../navbar.php'; ?>

    <div class="mdui-container">
        <h1 class="mdui-typo-display-2">Language Editor</h1>
        <form id="configForm" class="mdui-form" method="post" action="./save_config.php">
            <?php foreach ($languageVars as $langVersion => $langArray): ?>
                <h2 class="mdui-typo-display-1"><?php echo $langVersion; ?></h2>
                <input type="hidden" name="langVersion" value="<?php echo $langVersion; ?>">
                <?php foreach ($langArray as $key => $value): ?>
                    <div class="mdui-textfield">
                        <label class="mdui-textfield-label"><?php echo $key; ?></label>
                        <input class="mdui-textfield-input" type="text" name="<?php echo $langVersion; ?>[<?php echo $key; ?>]" value="<?php echo $value; ?>">
                    </div>
                <?php endforeach; ?>
                <hr>
            <?php endforeach; ?>
            <button type="submit" class="mdui-btn mdui-btn-raised mdui-color-theme mdui-m-t-2">Save Changes</button>
        </form>
    </div>
</body>
</html>
