<?php
header('Content-Type: application/json');

function generateRandomString($length) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

$original_url = isset($_GET['original_url']) ? $_GET['original_url'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : 'no_password';
$diy_url = isset($_GET['diy_url']) ? $_GET['diy_url'] : generateRandomString(rand(5, 10));

if (empty($original_url)) {
    $response = array('code' => -100, 'msg' => 'Error: no original_url');
    echo json_encode($response);
} else {
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $cans_data = "{$original_url}<cut>{$diy_url}<cut>{$password}<cut>{$ip_address}<next>";

    // Write CANS to file
    file_put_contents('url.cans', $cans_data . PHP_EOL, FILE_APPEND);

    // Prepare response JSON
    $response = array(
        'code' => 1,
        'msg' => 'OK !!!',
        'original_url' => $original_url,
        'password' => $password,
        'diy_url' => $diy_url
    );

    echo json_encode($response);
}
?>
