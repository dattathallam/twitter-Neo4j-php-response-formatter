<?php ob_start(); ?>
<?php
	ini_set('display_errors', 1);
	require_once 'vendor/autoload.php';

	use Neoxygen\NeoClient\ClientBuilder;

	$client = ClientBuilder::create()
		   ->addConnection('default','http','localhost',7474,true,'neo4j','datta')
			->setAutoFormatResponse(true)
			#->enableNewFormattingService()
	    ->build();
?>
<?php
	if(isset($_POST["submit"])) 
	{
		if (isset($_POST["handle"])) {
			$query = 'create (u:User {name:"'.$_POST["username"].'",handle:"@'.$_POST["handle"].'",email:"'.$_POST["email"].'",password:"'.$_POST["password"].'",dob:"'.$_POST["dob"].'"})';
			$result = $client->sendCypherQuery($query);
			// echo 'alert("I am here")';
			
			session_start();
			
			$_SESSION['rootuser'] = $_POST["username"];
			$_SESSION['username'] = $_POST["username"];
			$_SESSION['handle'] = "@".$_POST["handle"];
			$_SESSION['email'] = $_POST["email"];
			header('location:home.php');
			exit;
		}
		else
		{
			$query = 'match (u:User {name:"'.$_POST["username"].'",password:"'.$_POST["password"] .'"}) return u';
			$result = $client->sendCypherQuery($query)->getResult();
			$temp = $result->get('u');
			if($temp != NULL)
			{
				session_start();		
				$_SESSION['rootuser'] = $temp -> getProperty('name');
				$_SESSION['username'] = $temp -> getProperty('name');
				$_SESSION['handle'] = $temp -> getProperty('handle');
				$_SESSION['email'] = $temp -> getProperty('email');

				header('location:home.php');
				exit;
			}
			header('location:index.php');
			exit;
		}
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Twitter</title>
	<script type="text/javascript" src="js/jquery-latest.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/new_style.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<header>
		<div  style="background-color: #1DA1F2;min-height: 50px; min-width: 100%;">
			<div class="col-xs-4"></div>
			<div class="col-xs-4" style="text-align: center;top: 9px;"><img src="twitter.png" width="30px;" height="30px;" ></div>
			<div class="col-xs-4 collapse navbar-collapse" style="float: right;">
			    <ul class="nav navbar-nav navbar-right">
			        <li><p class="navbar-text">Already have an account?</p></li>
			        <li class="dropdown">
			          <a class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
						<ul id="login-dp" class="dropdown-menu">
							<li>
								 <div class="row">
									<div class="col-md-12">
										 <form class="form" role="form" method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> id="login-nav">
											<div class="form-group">
												 <label class="sr-only" for="exampleInputEmail2">User Name</label>
												 <input type="text" class="form-control" name="username" placeholder="User Name" required>
											</div>
											<div class="form-group">
												 <label class="sr-only" for="exampleInputPassword2">Password</label>
												 <input type="password" class="form-control" name="password" placeholder="Password" required>
											</div>
											<div class="form-group">
												 <button type="submit" class="btn btn-primary btn-block" name= "submit" value="submit">Sign in</button>
											</div>
										 </form>
									</div>
								 </div>
							</li>
						</ul>
			        </li>
			     </ul>
		    </div>
		</div>
	</header>
</head>
<body>
	<div class="col-xs-12">
		<div class="col-xs-4"></div>
		<div class="col-xs-4">
			<div style="padding-top: 100px;">
				<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
					<p style="text-align: center; font-size: 30px;line-height: 36px;font-weight: 300;margin-bottom: 24px;padding: 0;">Join Twitter Today</p>
			    	<div class="input-group">
			      		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			      		<input id="username" type="text" class="form-control signup" name="username" placeholder="User Name">
			    	</div>
			    	<br>
			    	<div class="input-group">
			      		<span class="input-group-addon">@</span>
			      		<input id="handle" type="text" class="form-control signup" name="handle" placeholder="Twitter Handle">
			    	</div>
			    	<br>
			    	<div class="input-group">
			     		<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
			      		<input id="dob" type="text" class="form-control signup" name="dob" placeholder="DOB : Month Day ,Year" autocomplete="off">
			    	</div>
			    	<br>
			    	<div class="input-group">
			     		<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			      		<input id="email" type="text" class="form-control signup" name="email" placeholder="Email" autocomplete="off">
			    	</div>
			    	<br>
			    	<div class="input-group">
			      		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			      		<input id="password" type="password" class="form-control signup" name="password" placeholder="Password">
			    	</div>
			    	<br>
			    	<div class="col-xs-4"></div>
			    	<div class="col-xs-4" style="text-align: center;">
				    	<input type="submit" class="btn" style="background-color: #1DA1F2; border-color: #1DA1F2; color: white;" value="Sign Up" name="submit">
			    	<div class="col-xs-4"></div>
				    </div>
	  			</form>
			</div>
		</div>
		<div class="col-xs-4"></div>
	</div>	
</body>
</html>
<?php
	ob_end_flush();
?>