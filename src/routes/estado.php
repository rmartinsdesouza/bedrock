<?php

//Get All Estado
$app->get('/api/estado', function($request, $response){
	

	$sql = "SELECT * FROM ESTADO";


	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->query($sql);
		$estado = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($estado);
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

//Get Singer Estado
$app->get('/api/estado/{id}', function($request, $response){
	$id = $request->getAttribute('id');

	$sql = "SELECT * FROM ESTADO WHERE CODIGO = '$id'";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->query($sql);
		$estado = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($estado);
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});


//Add Estado
$app->post('/api/estado', function( $request, $response){
	$DESCRICAO = $request->getParam('DESCRICAO');
	
	$sql = "INSERT INTO ESTADO (DESCRICAO ) VALUES (:DESCRICAO )";
	echo $sql;
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);

		$stmt->bindParam(':DESCRICAO',$DESCRICAO);
		$stmt->execute();
		
		echo '{"notice": {"text": "Estado Adicionada"}';

	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});


//Update Estado
$app->put('/api/estado/update/{id}', function( $request, $response){
	$CODIGO = $request->getAttribute('id');
	$DESCRICAO = $request->getParam('DESCRICAO');


	$sql = "UPDATE ESTADO SET
				DESCRICAO = :DESCRICAO
			WHERE CODIGO = $CODIGO";
	echo $sql;
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);

		$stmt->bindParam(':DESCRICAO',$DESCRICAO);
		
		$stmt->execute();
		
		
		echo '{"notice": {"text": "Estado Alterada"}';

	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});


//Delete Estado
$app->delete('/api/estado/{id}', function( $request,  $response){
	$id = $request->getAttribute('id');

	$sql = "DELETE FROM ESTADO WHERE CODIGO = '$id'";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$db = null;
		
		echo '{"notice": {"text": "Estado Apagada"}';		
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

