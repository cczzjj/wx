<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use Request;

const TOKEN = 'wechat';

class MessageController
{

    public function auth()
    {
        $echoStr = Request::input('echostr');
        $signature = Request::input('signature');
        $timestamp = Request::input('timestamp');
        $nonce = Request::input('nonce');
        $token = TOKEN;
        // 将token、timestamp、nonce按字典序排序
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode($tmpArr);
        // 对tmpStr进行sha1加密
        $tmpStr = sha1($tmpStr);
        if ($tmpStr == $signature) {
            return $echoStr;
        }
    }

    public function index()
    {
        $options = [
            'app_id' => 'wx10fd8f8dcf8127f3',
            'secret' => '5e929a77d26ce0d6c269641886020eb8',
            'token' => 'wechat',
            'response_type' => 'array'
        ];
        $app = new Application($options);

        $server = $app->server;

        $server->setMessageHandler(function ($message) {
            return '你好！欢迎关注我！';
        });

        $response = $server->serve();

        $response->send();
    }
}