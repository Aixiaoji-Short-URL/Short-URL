<?php
include("../../Configs/Main/WebMainConfig.php");
$UseLanguage = "../..".$ConfigMain["Language"];
include($UseLanguage);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理后台首页</title>
    <link rel="stylesheet" href="../Resource-File/MDUI/main/mdui.min.css"> 
    <script src="../Resource-File/MDUI/main/mdui.min.js"></script>
</head>
<body>
        <?php include '../navbar.php'; ?>

    <div class="mdui-container">
        
        <h1 class="mdui-typo-display-2">Select the edited version</h1>
        <p>UseLanguage=<?php echo $UseLanguage; ?></p>
        
        
        <div class="mdui-row mdui-m-t-2">
            <div class="mdui-col-md-4">
                <div class="mdui-card">
                    <div class="mdui-card-primary">
                        <div class="mdui-card-primary-title">Edit V1</div>
                    <div class="mdui-card-actions">
                        <a href="./V1.php" class="mdui-btn mdui-btn-raised mdui-color-blue">EDIT</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mdui-row mdui-m-t-2">
            <div class="mdui-col-md-4">
                <div class="mdui-card">
                    <div class="mdui-card-primary">
                        <div class="mdui-card-primary-title">Edit V2</div>
                    <div class="mdui-card-actions">
                        <a href="./V2.php" class="mdui-btn mdui-btn-raised mdui-color-blue">EDIT</a>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
</body>
</html>
