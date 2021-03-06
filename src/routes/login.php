<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

//Get All Login
$app->get('/api/login', function($request, $response){
	// echo 'login';

	$sql = "SELECT * FROM LOGIN";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->query($sql);
		$login = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($login, JSON_UNESCAPED_UNICODE);
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

//Get Singer Login
$app->get('/api/login/{id}', function($request, $response){
	$id = $request->getAttribute('id');

	$sql = "SELECT * FROM LOGIN WHERE CODIGO = '$id'";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->query($sql);
		$login = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($login);
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});


//Add Login
$app->post('/api/login', function( $request, $response){
	$CPF = $request->getParam('CPF');
	$SENHA = $request->getParam('SENHA');
	
	$sql = "INSERT INTO LOGIN (CPF, SENHA ) VALUES (:CPF, :SENHA )";
	echo $sql;
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);

		$stmt->bindParam(':CPF',$CPF);
		$stmt->bindParam(':SENHA',$SENHA);
		$stmt->execute();
		
		echo '{"notice": {"text": "Login Adicionada"}';

	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});


//Update Login
$app->put('/api/login/update/{id}', function( $request, $response){
	$CODIGO = $request->getAttribute('id');
	$CPF = $request->getParam('CPF');
	$SENHA = $request->getParam('SENHA');


	$sql = "UPDATE LOGIN SET
				CPF = :CPF,
				SENHA = :SENHA
			WHERE CODIGO = $CODIGO";
	echo $sql;
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);

		$stmt->bindParam(':CPF',$CPF);
		$stmt->bindParam(':SENHA',$SENHA);
		
		$stmt->execute();
		
		
		echo '{"notice": {"text": "Login Alterada"}';

	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});


//Delete Login
$app->delete('/api/login/{id}', function( $request,  $response){
	$id = $request->getAttribute('id');

	$sql = "DELETE FROM LOGIN WHERE CODIGO = '$id'";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$db = null;
		
		echo '{"notice": {"text": "Login Apagada"}';		
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});