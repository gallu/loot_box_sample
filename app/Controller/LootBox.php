<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Controller\ControllerBase;

class LootBox extends ControllerBase
{
    // がちゃ一覧
    public function list(ServerRequestInterface $request, ResponseInterface $response, $routeArguments)
    {
        $decks = [
            [
                'id' => 1,
                'name' => '普通のがちゃ',
                'detail' => 'なんの変哲もないがちゃ',
            ],
            [
                'id' => 2,
                'name' => 'よいがちゃ',
                'detail' => 'よい感じのがちゃ',
            ],
            [
                'id' => 3,
                'name' => 'お高いがちゃ',
                'detail' => 'お高級ながちゃ',
            ],
        ];

        // 出力
        return $this->retJson($response, ['decks' => $decks]);
    }

    // がちゃをひく
    public function draw(ServerRequestInterface $request, ResponseInterface $response, $routeArguments)
    {
        $dick_id = intval($routeArguments['dick_id']);
        $num = abs($routeArguments['num'] ?? 1) % 20; // XXX 雑にvalidate: 0は放置
        //
        $card_ids = [];
        for($i = 0; $i < $num; ++$i) {
            $card_ids[] = mt_rand(1, 999);
        }

        // 出力
        return $this->retJson($response, ['card_ids' => $card_ids]);
    }

}
