<?php

//Get All Campo
$app->get('/api/campo', function($request, $response){
	

	$sql = "SELECT * FROM CAMPO";


	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->query($sql);
		$campo = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($campo, JSON_UNESCAPED_UNICODE);
		
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

//Get Singer Campo
$app->get('/api/campo/{id}', function($request, $response){
	$id = $request->getAttribute('id');

	$sql = "SELECT * FROM CAMPO WHERE CODIGO = '$id'";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->query($sql);
		$campo = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($campo);
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});


//Add Campo
$app->post('/api/campo', function( $request, $response){
	$DESCRICAO = $request->getParam('DESCRICAO');
	$SISTEMA_CODIGO = $request->getParam('SISTEMA_CODIGO');
	
	$sql = "INSERT INTO CAMPO (DESCRICAO, SISTEMA_CODIGO ) VALUES (:DESCRICAO, :SISTEMA_CODIGO )";
	echo $sql;
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);

		$stmt->bindParam(':DESCRICAO',$DESCRICAO);
		$stmt->bindParam(':SISTEMA_CODIGO',$SISTEMA_CODIGO);

		$stmt->execute();
		
		echo '{"notice": {"text": "Campo Adicionada"}';

	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

//Update Campo
$app->put('/api/campo/update/{id}', function( $request, $response){
	$CODIGO = $request->getAttribute('id');
	$DESCRICAO = $request->getParam('DESCRICAO');
	$SISTEMA_CODIGO = $request->getParam('SISTEMA_CODIGO');


	$sql = "UPDATE CAMPO SET
				DESCRICAO = :DESCRICAO,
				SISTEMA_CODIGO = :SISTEMA_CODIGO
			WHERE CODIGO = $CODIGO";
	echo $sql;
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);

		$stmt->bindParam(':DESCRICAO',$DESCRICAO);
		$stmt->bindParam(':SISTEMA_CODIGO',$SISTEMA_CODIGO);

		$stmt->execute();
		
		
		echo '{"notice": {"text": "Campo Alterada"}';

	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});


//Delete Campo
$app->delete('/api/campo/{id}', function( $request,  $response){
	$id = $request->getAttribute('id');

	$sql = "DELETE FROM CAMPO WHERE CODIGO = '$id'";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$db = null;
		
		echo '{"notice": {"text": "Campo Apagada"}';		
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});