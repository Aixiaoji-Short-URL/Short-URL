<?php
include("../../Configs/Main/WebMainConfig.php");
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
    <?php include '../navbar.php'; ?>


    <div class="mdui-container">
        <h1 class="mdui-typo-display-2">Config Editor</h1>
        <form id="configForm" class="mdui-form" method="post" action="save_config.php">
            <?php foreach ($ConfigMain as $key => $value): ?>
                <div class="mdui-textfield">
                    <label class="mdui-textfield-label">
                        <?php echo isset($ConfigMainLabels[$key]) ? $ConfigMainLabels[$key] : $key; ?>
                    </label>
                    <input class="mdui-textfield-input" type="text" name="<?php echo $key; ?>" value="<?php echo $value; ?>">
                </div>
            <?php endforeach; ?>
            <button type="submit" class="mdui-btn mdui-btn-raised mdui-color-theme mdui-m-t-2">Save Changes</button>
        </form>
    </div>
</div>

</body>
</html>
