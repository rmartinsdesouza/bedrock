<?php

//Get All Cidade
$app->get('/api/cidade', function($request, $response){
	

	$sql = "SELECT * FROM CIDADE";


	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->query($sql);
		$cidade = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($cidade);
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

//Get Singer Cidade
$app->get('/api/cidade/{id}', function($request, $response){
	$id = $request->getAttribute('id');

	$sql = "SELECT * FROM CIDADE WHERE CODIGO = '$id'";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->query($sql);
		$cidade = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($cidade);
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});


//Add Cidade
$app->post('/api/cidade', function( $request, $response){
	$DESCRICAO = $request->getParam('DESCRICAO');
	$ESTADO_CODIGO = $request->getParam('ESTADO_CODIGO');
	
	$sql = "INSERT INTO CIDADE (DESCRICAO, ESTADO_CODIGO ) VALUES (:DESCRICAO, :ESTADO_CODIGO )";
	echo $sql;
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);

		$stmt->bindParam(':DESCRICAO',$DESCRICAO);
		$stmt->bindParam(':ESTADO_CODIGO',$ESTADO_CODIGO);

		$stmt->execute();
		
		echo '{"notice": {"text": "Cidade Adicionada"}';

	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

//Update Cidade
$app->put('/api/cidade/update/{id}', function( $request, $response){
	$CODIGO = $request->getAttribute('id');
	$DESCRICAO = $request->getParam('DESCRICAO');
	$ESTADO_CODIGO = $request->getParam('ESTADO_CODIGO');


	$sql = "UPDATE CIDADE SET
				DESCRICAO = :DESCRICAO,
				ESTADO_CODIGO = :ESTADO_CODIGO
			WHERE CODIGO = $CODIGO";
	echo $sql;
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);

		$stmt->bindParam(':DESCRICAO',$DESCRICAO);
		$stmt->bindParam(':ESTADO_CODIGO',$ESTADO_CODIGO);

		$stmt->execute();
		
		
		echo '{"notice": {"text": "Cidade Alterada"}';

	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});


//Delete Cidade
$app->delete('/api/cidade/{id}', function( $request,  $response){
	$id = $request->getAttribute('id');

	$sql = "DELETE FROM CIDADE WHERE CODIGO = '$id'";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$db = null;
		
		echo '{"notice": {"text": "Cidade Apagada"}';		
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});