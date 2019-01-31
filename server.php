<?php
include __DIR__ . '/vendor/autoload.php'; // 引入 composer 入口文件

use EasyWeChat\Foundation\Application;

$options = [
    'debug' => true,
    'app_id' => 'wx10fd8f8dcf8127f3',
    'secret' => '5e929a77d26ce0d6c269641886020eb8',
    'token' => 'wechat'
];

$app = new Application($options);

$response = $app->server->serve();

// 将响应输出
$response->send(); // Laravel 里请使用：return $response;