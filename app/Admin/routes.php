<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('/article', 'ArticleController');
    $router->resource('/tags', 'TagController');
    $router->resource('/category', 'CategoryController');
    $router->resource('/subject', 'SubjectController');
});
