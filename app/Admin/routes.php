<?php

use Illuminate\Routing\Router;



use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->get('/', 'HomeController@index')->name('home');
    $router->get('/site', 'HomeController@test')->name('test');
    $router->get('/heatmap/{id}', 'ClickMapController@getHeatMap')->name('heatmap');
    $router->get('/statistic/{id}', 'ClickMapController@getHourStatistics')->name('heatmap');
    $router->resource('projects', ProjectController::class);

  
});
