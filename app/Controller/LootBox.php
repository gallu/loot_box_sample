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
                'can_loot' => true,
            ],
            [
                'id' => 2,
                'name' => '普通のがちゃ 10連',
                'detail' => '普通のがちゃを10回も引けるよ！！',
                'can_loot' => true,
            ],
            [
                'id' => 3,
                'name' => 'お高いがちゃ',
                'detail' => 'お高級ながちゃ',
                'can_loot' => false,
            ],
        ];

        // 出力
        return $this->retJson($response, ['decks' => $decks]);
    }

    // がちゃをひく
    public function draw(ServerRequestInterface $request, ResponseInterface $response, $routeArguments)
    {
        $dick_id = intval($routeArguments['dick_id']);
        $num = 1;
        if (2 === $dick_id) {
            $num = 10;
        }
        //
        $card_ids = [];
        for($i = 0; $i < $num; ++$i) {
            $card_ids[] = mt_rand(1, 999);
        }

        // 出力
        return $this->retJson($response, ['card_ids' => $card_ids]);
    }

}
