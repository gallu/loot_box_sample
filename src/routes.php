<?php
// Routes

// Controllerの指定が楽なので、この名前空間にしておく
namespace App\Controller;
//
use App\Middleware\MiddlewareSample;

//
$app->get('/', Home::class . ':index');

