<?php

//Get All Perfil
$app->get('/api/perfil', function($request, $response){
	// echo 'perfil';

	$sql = "SELECT * FROM PERFIL";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->query($sql);
		$perfil = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($perfil);
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

//Get Singer Perfil
$app->get('/api/perfil/{id}', function($request, $response){
	$id = $request->getAttribute('id');

	$sql = "SELECT * FROM PERFIL WHERE CODIGO = '$id'";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->query($sql);
		$perfil = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($perfil);
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});


//Add Perfil
$app->post('/api/perfil', function( $request, $response){
	$DESCRICAO = $request->getParam('DESCRICAO');
	$LOGIN_CODIGO = $request->getParam('LOGIN_CODIGO');
	
	$sql = "INSERT INTO PERFIL (DESCRICAO, LOGIN_CODIGO ) VALUES (:DESCRICAO, :LOGIN_CODIGO )";
	echo $sql;
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);

		$stmt->bindParam(':DESCRICAO',$DESCRICAO);
		$stmt->bindParam(':LOGIN_CODIGO', $LOGIN_CODIGO);
		$stmt->execute();
		
		echo '{"notice": {"text": "Pessoa Adicionada"}';

	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});


//Update Perfil
$app->put('/api/perfil/update/{id}', function( $request, $response){
	$CODIGO = $request->getAttribute('id');
	$DESCRICAO = $request->getParam('DESCRICAO');


	$sql = "UPDATE PERFIL SET
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
		
		
		echo '{"notice": {"text": "Pessoa Alterada"}';

	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});


//Delete Perfil
$app->delete('/api/perfil/{id}', function( $request,  $response){
	$id = $request->getAttribute('id');

	$sql = "DELETE FROM PERFIL WHERE CODIGO = '$id'";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$db = null;
		
		echo '{"notice": {"text": "Perfil Apagada"}';		
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});