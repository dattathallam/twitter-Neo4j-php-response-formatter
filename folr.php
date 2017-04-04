<?php
	ini_set('display_errors', 1);
	require_once 'vendor/autoload.php';

	use Neoxygen\NeoClient\ClientBuilder;

	$client = ClientBuilder::create()
		   ->addConnection('default','http','localhost',7474,true,'neo4j','jami')
			->setAutoFormatResponse(true)
			#->enableNewFormattingService()
	    ->build();	

	    	session_start();
    	$user = $_SESSION['rootuser'];
	    	
			//$user = $_SESSION['a'];
			$uid = $_GET['id1'];
			

			 					$query3 = 'MATCH (user1:User)-[r:follows]->(user2:User) WHERE user1.name ="'. $user .'" AND ID(user2) = '. $uid . ' RETURN r';
								$result3 = $client->sendCypherQuery($query3)->getResult();
								$temp3 = $result3->get('r');
								$tempsize3 = count($temp3);

								if($tempsize3 == 0){
								

								 $query = 'MATCH(user1:User),(user2:User)
								WHERE user1.name ="'. $user .'" and ID(user2) = '. $uid .'
								CREATE(user1)-[r1:follows]->(user2)
								RETURN r1';
								$result = $client->sendCypherQuery($query)->getResult();

								}
								else{
								$query3 = 'MATCH (user1:User)-[r:follows]->(user2:User) WHERE user1.name ="'. $user .'" AND ID(user2) = '. $uid . ' DELETE r';
								$result3 = $client->sendCypherQuery($query3)->getResult();
			
								}

	header('Location: ' . $_SERVER['HTTP_REFERER']);




?>

<!DOCTYPE html>
<html>
<head>
<header>

 </header>
 </head>

 <body> </body>
 </html>