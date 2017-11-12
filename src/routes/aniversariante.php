<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
//Get All Perfil
$app->get('/api/aniversariante', function($request, $response){
	// echo 'aniversariante';

	$sql = "SELECT * FROM ANIVERSARIANTE";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->query($sql);
		$aniversariante = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($aniversariante, JSON_UNESCAPED_UNICODE);
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

//Get Singer Perfil
$app->get('/api/aniversariante/{id}', function($request, $response){
	$id = $request->getAttribute('id');

	$sql = "SELECT * FROM ANIVERSARIANTE WHERE CODIGO = '$id'";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->query($sql);
		$aniversariante = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($aniversariante);
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});


//Add Perfil
$app->post('/api/aniversariante', function( $request, $response){
	$DATA = $request->getParam('DATA');
	$NOME = $request->getParam('NOME');
	$EMAIL = $request->getParam('EMAIL');
	
	$sql = "INSERT INTO ANIVERSARIANTE (DATA, NOME, EMAIL ) VALUES (:DATA, :NOME, :EMAIL )";
	echo $sql;
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);

		$stmt->bindParam(':DATA',$DATA);
		$stmt->bindParam(':NOME', $NOME);
		$stmt->bindParam(':EMAIL', $EMAIL);
		$stmt->execute();
		
		echo '{"notice": {"text": "Aniversariante Adicionado"}';

	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});


//Update Perfil
$app->put('/api/aniversariante/update/{id}', function( $request, $response){
	$CODIGO = $request->getAttribute('id');
	$DATA = $request->getParam('DATA');
	$NOME = $request->getParam('NOME');
	$EMAIL = $request->getParam('EMAIL');


	$sql = "UPDATE ANIVERSARIANTE SET
				DATA = :DATA,
				NOME = :NOME,
				EMAIL = :EMAIL
			WHERE CODIGO = $CODIGO";
	echo $sql;
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);

		$stmt->bindParam(':DATA',$DATA);
		$stmt->bindParam(':NOME',$NOME);
		$stmt->bindParam(':EMAIL',$EMAIL);

		$stmt->execute();
		
		
		echo '{"notice": {"text": "Aniversariante Alterado"}';

	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});


//Delete Aniversariante
$app->delete('/api/aniversariante/{id}', function( $request,  $response){
	$id = $request->getAttribute('id');

	$sql = "DELETE FROM ANIVERSARIANTE WHERE CODIGO = '$id'";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$db = null;
		
		echo '{"notice": {"text": "Aniversariante Apagado"}';		
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});