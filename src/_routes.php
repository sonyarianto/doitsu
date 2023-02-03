<?php
use Symfony\Component\Routing\Route;

$routeObject['route']['app.index'] = new Route('/', ['_class_and_method' => 'Application::index']); // create / route and set class and method, in this case Application::index