
<?php

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
  require_once('../src/routes/pessoas.php');
  require_once('../src/routes/login.php');
  require_once('../src/routes/perfil.php');
  require_once('../src/routes/estado.php');
  require_once('../src/routes/cidade.php');
  require_once('../src/routes/campo.php');
  require_once('../src/routes/sistema.php');


$app->run();