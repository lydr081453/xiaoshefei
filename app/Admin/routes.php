<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('users', UserController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('brands', BrandController::class);
    $router->resource('products', ProductController::class);
    $router->resource('photos', PhotoController::class);
});


