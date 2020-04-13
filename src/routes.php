<?php
// Routes

// Controllerの指定が楽なので、この名前空間にしておく
namespace App\Controller;

//
use App\Middleware\MiddlewareAuth;

// ダミー
$app->get('', Home::class . ':index');
$app->get('/', Home::class . ':index');

/* 本体 */

// UUID作成
$app->get('/uuid', Uuid::class. ':get');

// ユーザ登録
$app->post('/register', User::class . ':create');

// セッション作成
$app->post('/session/get', ApiSession::class . ':create');
//$app->any('/session/get', ApiSession::class . ':create');

// 要認証
$app->group('', function() use ($app) {
    // がちゃ
    $app->group('/loot_box', function() use ($app) {
        $app->get('/list', LootBox::class . ':list');
        $app->post('/draw/{dick_id}', LootBox::class . ':draw');
    });

    // カード
    $app->group('/card', function() use ($app) {
        $app->get('/list', Card::class . ':list');
        $app->get('/detail/{card_id}', Card::class . ':detail');
        $app->get('/image/{card_id}', Card::class . ':image');
    });

})->add(new MiddlewareAuth($app->getContainer()));

