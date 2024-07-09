<html>
<head>
    <title><?php echo $LanguageV1["title_index"]; ?> - <?php echo $LanguageV2["title_i"]; ?></title>
    <link rel='stylesheet' type='text/css' href="<?php echo '..'.$ConfigMain['Theme'].'/CSS/i.css';?>">
</head>
<body>
    <form method='post' action=''>
        <h1><?php echo $LanguageV2["h1_i"]; ?></h1>
        <label for='password'><?php echo $LanguageV2["V-password_i"]; ?></label>
        <input type='password' name='password' id='password' required>
        <input type='submit' value='<?php echo $LanguageV2["V-submit_i"]; ?>'>
    </form>
</body>
</html>
