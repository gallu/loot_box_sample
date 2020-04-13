<?php
//
namespace App\Middleware;

//
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Middleware\MiddlewareBase;

//
class MiddlewareAuth extends MiddlewareBase
{
    /*
     */
    //
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next)
    {
        // コンテナの取得(何かに使うとき用)
        //$this->container

        // 前処理: 認証
        $flg = true;
        $awk = explode(' ', $request->getHeader('HTTP_AUTHORIZATION')[0] ?? '');
        if (0 !== strcasecmp('Bearer', $awk[0])) {
            $flg = false;
        }
        if ('' == @$awk[1]) { // XXX 一端、雑に
            $flg = false;
        }
        //
        if (false === $flg) {
            return $response->withJson([
                'status_code' => 401,
                'error_messages' => [
                    '認証エラー',
                ],
            ]);
        }

        // 呼び出し
        $response = $next($request, $response);

        //
        return $response;
    }

//
    protected $container;
}
