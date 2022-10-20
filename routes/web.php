<?php
namespace App;
/** @var \Laravel\Lumen\Routing\Router $router */
use App\Http\Controllers\DataController;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/save-details', 'DataController@saveDetails');
$router->post('/save-photo', 'DataController@savePhoto');
$router->post('/save-license', 'DataController@saveLicense');
$router->post('/save-passport', 'DataController@savePassport');
$router->post('/save-permit', 'DataController@savePermit');
$router->post('/get-details', 'DataController@getDetails');
$router->post('/complete', 'DataController@complete');
