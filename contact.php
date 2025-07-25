<?php
// contact.php - シンプル版
header('Content-Type: application/json; charset=utf-8');

// エラーログを有効化（デバッグ用）
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log');

// POSTデータの確認
if (!$_POST) {
    echo json_encode(["success" => false, "message" => "POSTデータがありません"]);
    exit;
}

// 必須項目の確認
if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
    echo json_encode(["success" => false, "message" => "必須項目が入力されていません"]);
    exit;
}

// メール送信
$to = "info@hiroshift.com";
$subject = "【Hiroshift】お問い合わせ: " . $_POST['name'];
$message = "=== お問い合わせ内容 ===\n";
$message .= "お名前: " . $_POST['name'] . "\n";
$message .= "メールアドレス: " . $_POST['email'] . "\n";
$message .= "お問い合わせ内容:\n" . $_POST['message'] . "\n";
$message .= "====================\n";

$headers = "From: contact@hiroshift.com\r\n";
$headers .= "Reply-To: " . $_POST['email'] . "\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";

// メール送信実行
$result = mail($to, $subject, $message, $headers);

if ($result) {
    echo json_encode(["success" => true, "message" => "お問い合わせを送信しました"]);
} else {
    echo json_encode(["success" => false, "message" => "送信に失敗しました"]);
}
?> 