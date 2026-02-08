<?php
// test-mail.php
echo "PHP Version: " . phpversion() . "<br>";
echo "mail()関数: " . (function_exists('mail') ? '利用可能' : '利用不可') . "<br>";

if (function_exists('mail')) {
    $result = mail("info@hiroshift.com", "テスト", "テストメールです");
    echo "送信テスト: " . ($result ? '成功' : '失敗');
} else {
    echo "mail()関数が利用できません";
}
?>