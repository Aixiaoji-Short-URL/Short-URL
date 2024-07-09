<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit url.json</title>
    <link rel="stylesheet" href="../Resource-File/MDUI/main/mdui.min.css"> 
    <script src="../Resource-File/MDUI/main/mdui.min.js"></script>
</head>
    <?php include '../navbar.php'; ?>
    <h1 class="mdui-typo-display-2">编辑url.json</h1>
    <?php
    $filename = '../../url.json'; // 文本文档的文件名

    // 检查文件是否存在
    if (!file_exists($filename)) {
        // 如果文件不存在，创建一个空文件
        file_put_contents($filename, '');
    }

    // 读取文本文档内容
    $content = file_get_contents($filename);

    // 如果表单已提交，保存修改后的内容
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newContent = $_POST['content'];
        file_put_contents($filename, $newContent);
        $content = $newContent; // 更新显示内容
        echo '<p style="color: green;">文件已保存。</p>';
    }
    ?>
<form method="post" class="mdui-form mdui-textfield mdui-textfield-floating-label">
    <div class="mdui-textfield mdui-textfield-floating-label">
        <textarea class="mdui-textfield-input" name="content" rows="29" cols="100" style="background-color:black; color:white;"><?php echo htmlspecialchars($content); ?></textarea>
    </div>
    <br>
    <button class="mdui-btn mdui-btn-raised mdui-color-theme mdui-ripple mdui-m-t-2" type="submit">保存</button>
</form>
</body>
</html>


