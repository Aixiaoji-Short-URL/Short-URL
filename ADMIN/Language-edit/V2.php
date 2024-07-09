<?php
include("../../Configs/Main/WebMainConfig.php");
$UseLanguage = "../..".$ConfigMain["Language"];
$SaveAPI = './save_config-V2.php';
include($UseLanguage);
$LanguageVersion = "LanguageV2";
$Edited = ${$LanguageVersion}; 
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
        <h1 class="mdui-typo-display-2">Language Editor - <?php echo $LanguageVersion; ?></h1>
        <p>UseLanguage=<?php echo $UseLanguage; ?></p>
        <p>SaveAPI=<?php echo $SaveAPI; ?></p>
        <p>LanguageVersion=<?php echo $LanguageVersion; ?></p>
        <form id="configForm" class="mdui-form" method="post" action="<?php echo $SaveAPI; ?>">
		<?php foreach ($Edited as $key => $value): ?>
		<div class="mdui-textfield">
                    <label class="mdui-textfield-label"><?php echo $key; ?></label>
                    <input class="mdui-textfield-input" type="text" name="<?php echo $key; ?>" value="<?php echo $value; ?>">
                </div>
            <?php endforeach; ?>
            <button type="submit" class="mdui-btn mdui-btn-raised mdui-color-theme mdui-m-t-2">Save Changes</button>
        </form>
    </div>
</div>

</body>
</html>
