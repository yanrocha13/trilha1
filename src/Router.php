<?php declare(strict_types=1);


include __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../database.php';

use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\Diactoros\Response;
use League\Route\Router;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use League\Route\Strategy\JsonStrategy;
use \Laminas\Diactoros\ResponseFactory;
use Acme\AuthMiddleware;

$request = ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

/*ROTAS HTTP*/
/*$router = new League\Route\Router;

// map a route
$router->map('GET', '/', function (ServerRequestInterface $request) : ResponseInterface {
    $response = new Laminas\Diactoros\Response;
    $response->getBody()->write('<h1>dasfd, World!</h1>');
    return $response;
});

$router->map('GET', '/auth', [App\controllers\IndexController::class, 'index']);

$response = $router->dispatch($request);*/

/*ROTAS API*/

$responseFactory = new ResponseFactory;

$strategy = new JsonStrategy($responseFactory);
$router   = (new Router)->setStrategy($strategy);
//$middleware = new AuthMiddleware();

// map a route
$router->map('GET', '/', [Controllers\AppController::class, 'index']);

$router->map('GET', '/auth', []);

$router->map('GET', '/notlogedin', function (ServerRequestInterface $request) : array {
    return [
        'title'   => 'Not logged in',
        'version' => 1,
    ];
});

$response = $router->dispatch($request);
// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);
