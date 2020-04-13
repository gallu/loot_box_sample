<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Controller\ControllerBase;

class User extends ControllerBase
{
    // ユーザ登録
    public function create(ServerRequestInterface $request, ResponseInterface $response, $routeArguments)
    {
        // XXX mock
        $uuid = $request->getParam('uuid', '');
        $name = $request->getParam('name', '');
        //
        $error_messages = [];
        if (false === \App\Libs\UuidUtil::isValid($uuid)) {
            $error_messages[] = 'uuidのフォーマットが正しくありません';
        }
        if ('' === $name) {
            $error_messages[] = 'nameは必須入力です';
        }
        //
        if ([] !== $error_messages) {
            return $this->retJson($response, [], 422, $error_messages);
        }

        // 出力
        return $this->retJson($response, []);
    }
}
