<?php
header('Content-Type: text/html; charset=utf-8');

function readCANS($file_path) {
    $lines = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $cans_data = [];

    foreach ($lines as $line) {
        $columns = explode('<cut>', $line);
        $cans_data[] = $columns;
    }

    return $cans_data;
}

function redirectToOriginalURL($original_url) {
    echo "<meta http-equiv='refresh' content='0;url={$original_url}'>";
    echo "您即将跳转 - You are about to jump to {$original_url}";
}

function displayError($message) {
    echo "<p style='color: red;'>{$message}</p>";
}

$i = isset($_GET['i']) ? $_GET['i'] : '';

if (empty($i)) {
    displayError('Error: Parameter "i" is not specified');
} else {
    $cans_data = readCANS('url.cans');

    $matched = false;
    foreach ($cans_data as $row) {
        if ($row[1] == $i) {
            $matched = true;

            if ($row[2] == 'no_password') {
                redirectToOriginalURL($row[0]);
            } else {
                echo "<html>
                        <head>
                            <title>Password Verification</title>
                            <style>
                                body {
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    height: 100vh;
                                    margin: 0;
                                    font-family: 'Arial', sans-serif;
                                }
                                form {
                                    text-align: center;
                                    background-color: #f5f5f5;
                                    padding: 20px;
                                    border-radius: 8px;
                                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                }
                                h1 {
                                    margin-bottom: 20px;
                                    color: #333;
                                }
                                label, input {
                                    display: block;
                                    margin-bottom: 15px;
                                }
                                input[type='password'] {
                                    width: 100%;
                                    padding: 10px;
                                    border: 1px solid #ccc;
                                    border-radius: 4px;
                                    box-sizing: border-box;
                                }
                                input[type='submit'] {
                                    background-color: #4caf50;
                                    color: white;
                                    padding: 10px 20px;
                                    border: none;
                                    border-radius: 4px;
                                    cursor: pointer;
                                }
                                input[type='submit']:hover {
                                    background-color: #45a049;
                                }
                            </style>
                        </head>
                        <body>
                            <form method='post' action=''>
                                <h1>输入密码进行跳转 - Enter password to redirect</h1>
                                <label for='password'>Password:</label>
                                <input type='password' name='password' id='password' required>
                                <input type='submit' value='Submit'>
                            </form>
                        </body>
                    </html>";

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $entered_password = isset($_POST['password']) ? $_POST['password'] : '';
                    if ($entered_password == $row[2]) {
                        redirectToOriginalURL($row[0]);
                    } else {
                        displayError('Error: Please re-enter the correct password');
                    }
                }
            }

            break;
        }
    }

    if (!$matched) {
        displayError('404 Does not have a specified URL');
    }
}
?>
