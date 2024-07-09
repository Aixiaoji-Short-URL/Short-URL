<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($LanguageV1["title_index"]); ?></title>
    <link rel="stylesheet" type="text/css" href=<?php echo ".".$ConfigMain["Theme"]."/CSS/index.css";?>>
</head>
<body>

<h1><?php echo htmlspecialchars($LanguageV1["h1_index"]); ?></h1>

<form method="POST" action="">
    <label for="original_url"><?php echo htmlspecialchars($LanguageV1["CC-original_url_index"]); ?></label>
    <input type="text" name="original_url" required>

    <label for="password"><?php echo htmlspecialchars($LanguageV1["CC-password_index"]); ?></label>
    <input type="text" name="password">

    <label for="diy_url"><?php echo htmlspecialchars($LanguageV1["CC-diy_url_index"]); ?></label>
    <input type="text" name="diy_url">

    <input type="submit" value="<?php echo htmlspecialchars($LanguageV1["Create-submit_index"]); ?>">
</form>
</body>
</html>