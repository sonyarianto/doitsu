<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/_config.php';
require_once __DIR__ . '/../src/Application.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Dotenv\Dotenv;

date_default_timezone_set('UTC'); // set timezone to UTC

$request = Request::createFromGlobals(); // get request object

require_once __DIR__ . '/../src/_routes.php'; // get routes definition

$routes = new RouteCollection();

foreach ($routeObject['route'] as $key => $value) {
    $routes->add($key, $value);
}

$routeObject['routes'] = $routes; // add routes to route object 

$context = new RequestContext(); // create context object
$context->fromRequest($request); // set context from request
$routeObject['context'] = $context; // add context to route object

$matcher = new UrlMatcher($routeObject['routes'], $routeObject['context']);
$routeObject['matcher'] = $matcher;

$requestUri = $request->getPathInfo(); // get request uri

if ($requestUri != '/') {
    $requestUri = rtrim($requestUri, '/');
}

$generator = new UrlGenerator($routeObject['routes'], $routeObject['context']);

try {
    $parameters = $routeObject['matcher']->match($requestUri, EXTR_SKIP); // match request uri with routes

    list($controllerClass, $controllerMethod) = explode('::', $parameters['_class_and_method']);
    
    $action = new $controllerClass(); // create controller object
    $action->$controllerMethod($parameters);
} catch (Exception $e) {
    if (get_class($e) == 'Symfony\Component\Routing\Exception\ResourceNotFoundException') {
        http_response_code(404); // send http response code for not found

        echo '404 Not Found';
    } 
}