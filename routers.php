<?php
$router->controller('/',\App\Controllers\FrontEnd\HomeController::class);
/*$router->get('/login',[\App\Controllers\FrontEnd\UserController::class,'showLogin']);
$router->post('/login',[\App\Controllers\FrontEnd\UserController::class,'processLogin']);
$router->get('/register',[\App\Controllers\FrontEnd\UserController::class,'showRegister']);
$router->post('/register',[\App\Controllers\FrontEnd\UserController::class,'processRegister']);*/
$router->controller('/dashboard',\App\Controllers\BackEnd\DashboardController::class);