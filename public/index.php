
<?php
ini_set('default_charset', 'UTF-8');
header("Access-Control-Allow-Origin: *");

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

error_reporting(E_ALL | E_STRICT);
ini_set('display_erros', 'On');

require '../lib/vendor/autoload.php';
require '../src/config/db.php';

$app = new \Slim\App;

$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});

//Pessoa Routes
  require_once('../src/routes/login.php');
  require_once('../src/routes/aniversariante.php');



$app->run();