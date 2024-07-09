<?php
// Read the existing config file
$configFile = '../../Configs/Main/WebMainConfig.php';
$WebMainConfigs = include($configFile);

// Convert the array to JSON and output it
header('Content-Type: application/json');
echo json_encode($WebMainConfigs);
?>