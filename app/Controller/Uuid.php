<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Controller\ControllerBase;

class Uuid extends ControllerBase
{
    public function get(ServerRequestInterface $request, ResponseInterface $response, $routeArguments)
    {
        //
        $uuid = trim(shell_exec('uuidgen -r'));

        // 出力
        return $this->retJson($response, ['uuid' => $uuid]);
    }
}
