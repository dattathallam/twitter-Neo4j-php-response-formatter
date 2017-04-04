<html>
<?php ob_start(); ?>
<?php
	// ini_set('display_errors', 1);
	require_once 'vendor/autoload.php';

	use Neoxygen\NeoClient\ClientBuilder;

	$client = ClientBuilder::create()
		   ->addConnection('default','http','localhost',7474,true,'neo4j','jagan')
			->setAutoFormatResponse(true)
			#->enableNewFormattingService()
	    ->build();
?>
<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	if(isset($_SESSION['username']))
    {
    	$user = $_SESSION['username'];
		$query = 'match (u:User) where u.name ="'. $user .'" return u';
		$result = $client->sendCypherQuery($query)->getResult();
		$temp = $result->get('u');
    	$handle = $temp -> getProperty('handle');
    	$email = $temp -> getProperty('email');
    	// echo $email;
    }
	else{
		header('location:signup.php');
	}	
?>
<?php
	if(isset($_POST["tweet"])) 
	{
       
			$query = 'create (t1: Tweet {text:"'.$_POST["TweetText"].'"})';
			$result = $client->sendCypherQuery($query);
            $query1 = 'MATCH (u: Tweet) WHERE u.text="'.$_POST["TweetText"].'" RETURN u';
			$result1 = $client->sendCypherQuery($query1)->getResult();
            $var = $result1->getSingleNode('Tweet');
            $id = $var->getID();
            //echo $id;
            $query2 = 'MATCH (user2:User {name:"'.$_SESSION['username'].'"}) , (t1:Tweet)
                        WHERE ID(t1)='.$id.'
                        CREATE(user2)-[r1:posts]->(t1)';
            $result2 = $client->sendCypherQuery($query2);
            
			// echo 'alert("I am here")';
			
			
			
			
			header('location:profile.php');
			exit;
	}	
?>
<?php
	if(isset($_POST["search"])) 
	{
       
			$_SESSION['searchText'] = $_POST["searchTweet"];
			header('location:search.php?');
			exit;
	}	
?>


<head>
    <title>Example</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/new_style.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .navbar-btn {
            margin-top: 5px;
            margin-bottom: 0px;
            margin-right: 0px;
        }
        
        button.tweet:hover {
            background-color: green;
            color: white;
        }
        
        .navbar {
            position: relative;
        }
        
        .brand {
            position: absolute;
            left: 50%;
            margin-left: -50px !important;
            /* 50% of your logo width */
            display: block;
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-default" height="30" padding="40" style="background-color: #1DA1F2 " ;>
        <div class="container-fluid" style="margin-left: 40px;margin-right: 30px">

            <ul class="nav navbar-nav" style="background-color: #1DA1F2">
                <li class="active"><a href="home.php" style="background-color: #1DA1F2; color: white;font-size: 20px"><span class="glyphicon glyphicon-home" style="background-color: #1DA1F2; size:15px;color: white; margin-right: 10px;" aria-hidden="true"></span>Home</a></li>
            </ul>
            <button class="btn navbar-btn navbar-right" style="margin-top: 10px"><a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true" item-height="30" item-width="30" style="margin-top: 0px"></span></a></button>
            <button type="button" class="tweet btn btn-success navbar-right  btn-info" data-toggle="modal" data-target="#myModal" style="  background-color: green;  margin: 10px;margin-left: -6;margin-top: 8px;"><a style="color: white">Tweet</a> </button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg" style="width: 650px; margin-top: 100px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="text-align: center">Compose new Tweet</h4>
                        </div>
                        <form action=<?php echo htmlspecialchars($_SERVER[ "PHP_SELF"]); ?> method="post">
                            <div class="modal-body form-control" style="height:150px;">
                                <textarea type="text" class="form-control" name="TweetText" rows="5" style="border-radius: 10px;" placeholder="What's Happening?"></textarea>
                            </div>
                            <div class="modal-footer" >
                                <input type="submit" class="btn btn-success btn-info" value="Tweet" name="tweet">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--modal finish-->
            <div class="navbar-header brand" style="margin-top: -10px;">

                <a class="navbar-brand " href="home.php" style="height:30px; width:30px; background-color: white;border-radius: 10px;">
                    <img alt="Brand" src="src/images/twitter-128.png" height="30" width="30">
                </a>
            </div>
            <form class="navbar-form navbar-right" action=<?php echo htmlspecialchars($_SERVER[ "PHP_SELF"]); ?> method="post">
                <div class="input-group">
                    <input type="text" name="searchTweet" class="form-control" style="border-radius: 25px;z-index: 1;width:250px " title="@ for names or # for tweets" placeholder="Twitter Search">
                    <div class="input-group-btn" style="position:inherit ">
                        <button class=" btn btn-default " type="submit" value="search" name="search"  style=" z-index:2;border-top-right-radius:25px;border-bottom-right-radius:25px; margin-left: -41px;height: 33px; ">
                                <i class="glyphicon glyphicon-search "></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </nav>
</body>

</html>