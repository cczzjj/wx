<?php
// 这行代码是引入 `composer` 的入口文件，这样我们的类才能正常加载。
include __DIR__ . '/vendor/autoload.php';

// 引入我们的主项目的入口类。
use EasyWeChat\Foundation\Application;

// 一些配置
$options = [
    'debug' => true,
    'app_id' => 'wx10fd8f8dcf8127f3',
    'secret' => '5e929a77d26ce0d6c269641886020eb8',
    'token' => 'wechat'
];

// 使用配置来初始化一个项目。
$app = new Application($options);

// 接收 & 回复用户消息
$app->server->setMessageHandler(function ($message) {
    return "您好！欢迎关注我!";
});

$response = $app->server->serve();

// 将响应输出
$response->send(); // Laravel 里请使用：return $response;