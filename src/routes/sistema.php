<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
//Get All Sistema
$app->get('/api/sistema', function($request, $response){
	

	$sql = "SELECT * FROM SISTEMA";


	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->query($sql);
		$sistema = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($sistema, JSON_UNESCAPED_UNICODE);
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

//Get Singer Sistema
$app->get('/api/sistema/{id}', function($request, $response){
	$id = $request->getAttribute('id');

	$sql = "SELECT * FROM SISTEMA WHERE CODIGO = '$id'";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->query($sql);
		$sistema = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($sistema);
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});


//Add Sistema
$app->post('/api/sistema', function( $request, $response){
	$DESCRICAO = $request->getParam('DESCRICAO');
	$PERFIL_CODIGO = $request->getParam('PERFIL_CODIGO');
	
	$sql = "INSERT INTO SISTEMA (DESCRICAO, PERFIL_CODIGO ) VALUES (:DESCRICAO, :PERFIL_CODIGO )";
	echo $sql;
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);

		$stmt->bindParam(':DESCRICAO',$DESCRICAO);
		$stmt->bindParam(':PERFIL_CODIGO',$PERFIL_CODIGO);

		$stmt->execute();
		
		echo '{"notice": {"text": "Sistema Adicionada"}';

	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

//Update Sistema
$app->put('/api/sistema/update/{id}', function( $request, $response){
	$CODIGO = $request->getAttribute('id');
	$DESCRICAO = $request->getParam('DESCRICAO');
	$PERFIL_CODIGO = $request->getParam('PERFIL_CODIGO');


	$sql = "UPDATE SISTEMA SET
				DESCRICAO = :DESCRICAO,
				PERFIL_CODIGO = :PERFIL_CODIGO
			WHERE CODIGO = $CODIGO";
	echo $sql;
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);

		$stmt->bindParam(':DESCRICAO',$DESCRICAO);
		$stmt->bindParam(':PERFIL_CODIGO',$PERFIL_CODIGO);

		$stmt->execute();
		
		
		echo '{"notice": {"text": "Sistema Alterada"}';

	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});


//Delete Sistema
$app->delete('/api/sistema/{id}', function( $request,  $response){
	$id = $request->getAttribute('id');

	$sql = "DELETE FROM SISTEMA WHERE CODIGO = '$id'";

	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db = $db->connect();
	
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$db = null;
		
		echo '{"notice": {"text": "Sistema Apagada"}';		
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});