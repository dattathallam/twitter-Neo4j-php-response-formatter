<?php
	ini_set('display_errors', 1);
	require_once 'vendor/autoload.php';

	use Neoxygen\NeoClient\ClientBuilder;

	$client = ClientBuilder::create()
		   ->addConnection('default','http','localhost',7474,true,'neo4j','jagan')
			->setAutoFormatResponse(true)
			#->enableNewFormattingService()
	    ->build();	
?>
<?php
	$arrayName = array();
	if(array_key_exists('jagan',$arrayName)){
		$arrayName['jagan'] += 1;
	}
	else
	{
		$arrayName['jagan'] = 1;
	}
	$arrayName['datta'] = 5;
	$arrayName['jami'] = 6;

	unset($arrayName['jagan']);
	$arr = array(1,2,3,4,3,2,1);
	// arsort($arr);
	var_dump($arrayName);
?>