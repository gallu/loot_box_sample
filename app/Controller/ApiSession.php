<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Controller\ControllerBase;

class ApiSession extends ControllerBase
{
    // セッション作成
    public function create(ServerRequestInterface $request, ResponseInterface $response, $routeArguments)
    {
        // XXX mock
        $uuid = $request->getParam('uuid', '');
        //
        $error_messages = [];
        if (false === \App\Libs\UuidUtil::isValid($uuid)) {
            $error_messages[] = 'uuidのフォーマットが正しくありません';
        }
        //
        if ([] !== $error_messages) {
            return $this->retJson($response, [], 422, $error_messages);
        }


        // セッションID作成
        $sid = base64_encode(random_bytes(32));

        // 出力
        return $this->retJson($response, ['session_id' => $sid]);
    }
}
