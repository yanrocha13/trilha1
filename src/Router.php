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
use League\Route\RouteGroup;
use Acme\AuthMiddleware;

$request = ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$responseFactory = new ResponseFactory;
$strategy = new JsonStrategy($responseFactory);
$router   = (new Router)->setStrategy($strategy);
//$middleware = new AuthMiddleware();

// map a route
$router->map('GET', '/', [Controllers\AppController::class, 'index']);

$router->group('/user', function (RouteGroup $route) {
    $route->map('POST', '/create', [Controllers\UsersController::class, 'create']);
});

$router->map('GET', '/notlogedin', function (ServerRequestInterface $request) : array {
    return [
        'title'   => 'Not logged in',
        'version' => 1,
    ];
});

$response = $router->dispatch($request);
// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);
