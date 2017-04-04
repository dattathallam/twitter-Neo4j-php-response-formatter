<?php
	ini_set('display_errors', 1);
	require_once 'vendor/autoload.php';

	use Neoxygen\NeoClient\ClientBuilder;

	$client = ClientBuilder::create()
		   ->addConnection('default','http','localhost',7474,true,'neo4j','jagan')
			->setAutoFormatResponse(true)
			#->enableNewFormattingService()
	    ->build();	

	    	session_start();
			$user = $_SESSION['a'];
			$tweetid = $_GET['id'];
	    	$rootuser = $_SESSION['rootuser'];
			


			$query3 = 'MATCH (u:User)-[r:likes]- (t:Tweet) WHERE ID(t) ='. $tweetid .'  and u.name ="'. $rootuser .'" RETURN r';
			$result3 = $client->sendCypherQuery($query3)->getResult();
			$temp3 = $result3->get('r');
			$tempsize3 = count($temp3);
			

			if($tempsize3 == 0)
			{

				$query3 = 'MATCH (u:User),(t:Tweet) WHERE ID(t) ='. $tweetid .'  and u.name ="'. $rootuser .'" CREATE(u)-[r1:likes]->(t)';
				$result3 = $client->sendCypherQuery($query3)->getResult();
			}
			else 
			{
				$query3 = 'MATCH (u:User)-[r:likes]- (t:Tweet) WHERE ID(t) ='. $tweetid .'  and u.name ="'. $rootuser .'" DELETE r';
				$result3 = $client->sendCypherQuery($query3)->getResult();
					
			}
			header('Location: ' . $_SERVER['HTTP_REFERER']);
?>