<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Controller\ControllerBase;

class Card extends ControllerBase
{
    // 所持カード一覧
    public function list(ServerRequestInterface $request, ResponseInterface $response, $routeArguments)
    {
        //
        $cards = [
             1 => 1,
             2 => 5,
             999 => 1,
        ];

        // 出力
        return $this->retJson($response, ['cards' => $cards]);
    }

    // カード詳細
    public function detail(ServerRequestInterface $request, ResponseInterface $response, $routeArguments)
    {
        //
        $card_id = intval($routeArguments['card_id']);

        //
        $card = [
            'id' => $card_id,
            'name' => 'カード名',
            'offence' => mt_rand(1, 999),
            'defence' => mt_rand(1, 999),
            'text' => 'カード情報とかフレーバーテキストとか',
        ];

        // 出力
        return $this->retJson($response, [$card]);
    }

    // カード画像
    public function image(ServerRequestInterface $request, ResponseInterface $response, $routeArguments)
    {
        //
        $card_id = intval($routeArguments['card_id']);
        //
        $image = file_get_contents(BASEPATH . '/resources/images/' . '001.png');

        // 出力
        return $response
                   ->withHeader('Content-Type', 'image/png')
                   ->write($image);
    }


}
