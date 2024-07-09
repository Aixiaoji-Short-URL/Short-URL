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
        <div class="mdui-row mdui-m-t-2">
            
            <div class="mdui-col-md-4">
                <div class="mdui-card">
                    <div class="mdui-card-primary">
                        <div class="mdui-card-primary-title" style="color: red; font-weight: bold;">Must watch!!!</div>
                        <div class="mdui-card-primary-subtitle" style="color: red; font-weight: bold;">必看！</div>
                    </div>
                    <div class="mdui-card-content">
                        <p>This management page is less secure. Please rename the "ADMIN" directory to prevent accidents! Thank you.</p>
                        <p>此管理页面的安全性较低，请将“ADMIN”目录改名防止事故！谢谢。</p>
                    </div>
                    <div class="mdui-card-actions">
                        <hr>
                        <p>This prompt will not close automatically, please delete it manually.</p>
                        <p>此提示不会自动关闭，请手动删除。</p>
                    </div>
                </div>
            </div>
            <!--
            <div class="mdui-col-md-4">
                <div class="mdui-card">
                    <div class="mdui-card-primary">
                        <div class="mdui-card-primary-title">GitHub News for Short-URL</div>
                        <div class="mdui-card-primary-subtitle">Short-URL的GitHub公告</div>
                    </div>
                    <div class="mdui-card-content">
                    </div>
                    <div class="mdui-card-actions">
                        <a href="#" class="mdui-btn mdui-btn-raised mdui-color-blue">Look</a>
                    </div>
                </div>
            </div>
            -->
            
            <!-- 添加更多卡片 -->
        </div>
    </div>
    
</body>
</html>
