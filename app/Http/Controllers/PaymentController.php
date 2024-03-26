<?php
require_once('./vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_51OwLSy08OiW90vNn7AchLB51mn7ieFUi3Tf8J9wI2Ph4R8Uz3TjeqWUHf4INyycxNSqokFkI7OJ0zPNfJgSsMYbw009cQN6msQ');
$chargeId = null;
try {
    // (1) オーソリ（与信枠の確保）
    $token = $_POST['stripeToken'];
    $charge = \Stripe\Charge::create(array(
        'amount' => 100,
        'currency' => 'jpy',
        'description' => 'test',
        'source' => $token,
        'capture' => false,
    ));
    $chargeId = $charge['id'];
    // (2) 注文データベースの更新などStripeとは関係ない処理
    // (3) 売上の確定
    $charge->capture();
    // 購入完了画面にリダイレクト
    header("Location: complete.php");
    exit;
} catch(Exception $e) {
    if ($chargeId !== null) {
        // 例外が発生すればオーソリを取り消す
        \Stripe\Refund::create(array(
            'charge' => $chargeId,
        ));
    }
    // エラー画面にリダイレクト
    header("Location: error.php");
    exit;
}
?>
