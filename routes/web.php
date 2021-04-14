<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });




$router->post('/register', 'Auth@Register');
$router->post('/login', 'Auth@Login');


$router->delete('/logout', 'Auth@Logout');


$router->post('/', 'Question@NewQuestion');


$router->get('/',  function() {

    $data = app('db')->table('question')->paginate(20);
    return response($data);
});





$router->get('/{id:[1-9]+}', 'Question@DetailQuestion');
$router->put('/{id:[1-9]+}', 'Question@EditQuestion');
$router->delete('/{id:[1-9]+}', 'Question@DeleteQuestion');


$router->get('Answere/{id:[1-9]+}', function($id) {

    $data = app('db')->table('answere')->where('id_question', $id);

    // check data
    if (!$data->first()) {
        return response(['msg' => 'id not fout'], 404);
    }

    return response($data->paginate(20));
});
$router->post('Answere/{id:[1-9]+}',  'Answere@AnswereQuestion');
$router->put('Answere/{id:[1-9]+}', 'Answere@EditAnswere');
$router->delete('Answere/{id:[1-9]+}', 'Answere@DelAnswere');
