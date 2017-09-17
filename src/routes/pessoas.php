<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// require '../lib/vendor/autoload.php';

$app = new \Slim\App;

//Get All Pessoas
$app->get('/api/pessoas', function(Request $request, Response $response){
	// echo 'pessoas';

	$sql = "SELECT * FROM PESSOA";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->query($sql);
		$pessoas = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($pessoas);
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

//Get Singer Pessoa
$app->get('/api/pessoa/{id}', function(Request $request, Response $response){
	$id = $request->getAttribute('id');

	$sql = "SELECT * FROM PESSOA WHERE CODIGO = '$id'";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->query($sql);
		$pessoas = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($pessoas);
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

//Add Pessoa
$app->post('/api/pessoa/add', function(Request $request, Response $response){
	$NOME = $request->getParam('NOME');
	$CPF = $request->getParam('CPF');
	$DATA_NASCIMENTO = $request->getParam('DATA_NASCIMENTO');
	$LOGIN_CODIGO = $request->getParam('LOGIN_CODIGO');

	$sql = "INSERT INTO PESSOA (NOME, CPF, DATA_NASCIMENTO, LOGIN_CODIGO) VALUES (:NOME, :CPF, :DATA_NASCIMENTO, :LOGIN_CODIGO)";
	echo $sql;
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);

		$stmt->bindParam(':NOME',$NOME);
		$stmt->bindParam(':CPF',$CPF);
		$stmt->bindParam(':DATA_NASCIMENTO',$DATA_NASCIMENTO);
		$stmt->bindParam(':LOGIN_CODIGO',$LOGIN_CODIGO);
		
		$stmt->execute();
		
		
		echo '{"notice": {"text": "Pessoa Adicionada"}';

	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

//Update Pessoa
$app->put('/api/pessoa/update/{id}', function(Request $request, Response $response){
	$CODIGO = $request->getAttribute('id');
	$NOME = $request->getParam('NOME');
	$CPF = $request->getParam('CPF');
	$DATA_NASCIMENTO = $request->getParam('DATA_NASCIMENTO');
	$LOGIN_CODIGO = $request->getParam('LOGIN_CODIGO');

	$sql = "UPDATE PESSOA SET
				NOME = :NOME, 
				CPF = :CPF, 
				DATA_NASCIMENTO = :DATA_NASCIMENTO, 
				LOGIN_CODIGO = :LOGIN_CODIGO
			WHERE CODIGO = $CODIGO";
	
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);

		$stmt->bindParam(':NOME',$NOME);
		$stmt->bindParam(':CPF',$CPF);
		$stmt->bindParam(':DATA_NASCIMENTO',$DATA_NASCIMENTO);
		$stmt->bindParam(':LOGIN_CODIGO',$LOGIN_CODIGO);
		
		$stmt->execute();
		
		
		echo '{"notice": {"text": "Pessoa Alterada"}';

	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});


//Delete Pessoa
$app->delete('/api/pessoa/delete/{id}', function(Request $request, Response $response){
	$id = $request->getAttribute('id');

	$sql = "DELETE FROM PESSOA WHERE CODIGO = '$id'";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$db = null;
		
		echo '{"notice": {"text": "Pessoa Apagada"}';		
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});