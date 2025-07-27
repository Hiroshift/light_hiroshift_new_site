<?php
// test-php.php - 安全版
error_reporting(0); // エラー表示を無効化
ini_set('display_errors', 0);
 
echo "PHP Version: " . phpversion() . "<br>";
echo "PHP is working!<br>";
echo "Current time: " . date('Y-m-d H:i:s') . "<br>";
echo "mail() function: " . (function_exists('mail') ? 'Available' : 'Not available') . "<br>";
?> 