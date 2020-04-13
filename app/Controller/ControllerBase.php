<?php

namespace App\Controller;

class ControllerBase
{
    /*
     */
    public function __construct($container)
    {
        // コンテナインスタンスの受け取り
        $this->container = $container;
    }
    
    // テンプレート用インスタンスの取得とrenderの発行
    protected function render($name, array $context = array())
    {
        // デフォで使う値を追加する
        $context['hoge'] = 'hoge'; // サンプル

        return $this->container->get('renderer')->render($name, $context);
    }

    // jsonでのreturn
    protected function retJson($response, $data, $status = 200, $error = null)
    {
        $json = [];
        $json['response'] = $data;
        $json['status_code'] = $status;
        if (null !== $error) {
            $json['error_messages'] = $error;
        }
        //
        return $response->withJson($json);
    }


//
    protected $container;
}
