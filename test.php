

<!DOCTYPE html>
<html>
<head>
	<title>Profile | Twitter</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/new_style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>

	<header>
		<nav class="navbar navbar-default navbar-fixed-top" style="z-index: 1080;">
			<div class="col-xs-12" style="background-color: #1DA1F2;min-height: 50px; min-width: 100%;">
				<div class="col-xs-5">
					<ul class="nav navbar-nav" style="background-color: #1DA1F2">
		                <li class="active"><a href="home.php" style="background-color: #1DA1F2; color: white;font-size: 20px"><span class="glyphicon glyphicon-home" style="background-color: #1DA1F2; size:15px;color: white; margin-right: 10px;" aria-hidden="true"></span>Home</a></li>
		            </ul>
				</div>
				<div class="col-xs-2" style="text-align: center;top: 9px;">
					<a href="home.php"><img src="twitter.png" width="30px;" height="30px;"></a>
				</div>
				<div class="col-xs-5">
					<button class="btn navbar-btn navbar-right" style="margin-top: 10px">
		            	<a href="logout.php">
		            		<span class="glyphicon glyphicon-off" aria-hidden="true" item-height="30" item-width="30" style="margin-top: 0px"></span>
		            	</a>
		            </button>
		            <button type="button" class="tweet btn btn-success navbar-right  btn-info" data-toggle="modal" data-target="#myModal" style=" background-color: green;  margin: 10px;margin-left: -6;margin-top: 8px;">
		            	<a style="color: white;text-decoration: none;">Tweet</a> 
		            </button>
		            <!-- Modal -->
		            <div class="modal fade" id="myModal" role="dialog">
		                <div class="modal-dialog modal-lg" style="width: 650px; margin-top: 100px;">
		                    <div class="modal-content">
		                        <div class="modal-header">
		                            <button type="button" class="close" data-dismiss="modal">&times;</button>
		                            <h4 class="modal-title" style="text-align: center">Compose new Tweet</h4>
		                        </div>
		                        <form action=/neo4j-php-response-formatter-master/profile.php method="post">
		                            <div class="modal-body form-control" style="height:150px;">
		                                <textarea type="text" class="form-control" name="TweetText" rows="5" style="border-radius: 10px;" placeholder="What's Happening?"></textarea>
		                            </div>
		                            <div class="modal-footer">
		                                <input type="submit" class="btn btn-success btn-info" value="Tweet" name="tweet">
		                            </div>
		                        </form>
		                    </div>
		                </div>
		            </div>
		            <form class="navbar-form navbar-right">
		                <div class="input-group">
		                    <input type="text" class="form-control" style="border-radius: 25px;z-index: 1;width:250px " placeholder="Twitter Search">
		                    <div class="input-group-btn" style="position:inherit ">
		                        <button class=" btn btn-default " type="submit " style=" z-index:2;border-top-right-radius:25px;border-bottom-right-radius:25px; margin-left: -41px;height: 33px; ">
		                                <i class="glyphicon glyphicon-search "></i>
		                        </button>
		                    </div>
		                </div>
	            	</form>
				</div>
			</div>
			<div class="col-xs-12" style="max-height: 50px;">
				<div class="col-xs-3"></div>
				<div class="col-xs-9">
					<nav class="navbar" style="background: #F8F8F8;" >
						<div class="container-fluid">
						    <ul class="nav navbar-nav">
						    	<li><a href="profile.php" style="font-weight: bolder;font-size: 16px;text-decoration: none; color: #9400D3;">TWEETS</a></li>
						    	<li><a href="followers.php" style="font-weight: bolder;font-size: 16px;text-decoration: none; color: #657786;">FOLLOWERS</a></li>
						    	<li><a href="following.php" style="font-weight: bolder;font-size: 16px;text-decoration: none; color: #657786;">FOLLOWING</a></li>
						    	<li><a href="likes.php" style="font-weight: bolder;font-size: 16px;text-decoration: none; color: #657786;">LIKES</a></li>
						    </ul>
						</div>
					</nav>
				</div>
			</div>
		</nav>
	</header>
</head>
<body>
	<div class="container" style="margin-top: 120px;">
		<div class="col-xs-12">
			<div class="col-xs-3" style="padding-left: 0px;">
					<div style="background-color: white; min-height: 120px;  border: 1px solid #c3c3c3; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;border-top-left-radius: 5px; border-top-right-radius: 5px; margin-right: 10px;">
					<div class="col-xs-12" style="min-height: 40px;background-color: #1DA1F2;">
						<span  style="color: white; text-align: center; padding: 15px; font-weight: bolder;font-size:150%;"><a href="profile.php?username=Jami" style="text-decoration: none;color: white;">Jami</a><br>
						</span>
						<span style="color: white;font-weight: normal;font-size:90%">
						&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;@DileepKumarJami</span>
					</div>
					<div class="col-md-12" style="min-height: 80px;text-align: center;font-weight: normal;font-size:85%; margin: 15px 0px;">
						<table>
						  <tr>
						    <th style="margin: 1px;color: #8A2BE2;">&nbsp;TWEETS&nbsp;</th>
						    <th style="margin: 1px;color: #8A2BE2;">&nbsp;FOLLOWING&nbsp;</th>
						    <th style="margin: 1px;color: #8A2BE2;">&nbsp;FOLLOWERS&nbsp;</th>
						  </tr>
						  <tr>
						    <td>
						    	3						    </td>
						    <td>
						    	3						    </td>
						    <td>
						    	6						    </td>
						  </tr>
						</table>
					</div>
				</div>
			</div>
            </div>
		</p>
        </div>


					
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background-color: #1DA1F2;!important;font-weight: bolder;" > 
                        <p>Jami </p> 
                    </div>
                    
                    <div class="panel-body">
                        <p style="text-align:center;">
                            very excited that #Baahubali2 will release in @IMAX format, which enhances the hugeness & the spirit of Baahubali..<br>37</br>					
                            <button type="button"  data-toggle="modal" id="rt" data-target="#retweetmodal" style=" background-color: blue  margin: 10px;margin-left: -6;margin-top: 8px;">
		            	        <a  id= "pp" style="color: white;text-decoration: none;"><img src="retweet.png" width="30px;" height="30px;"></a> 
		                    </button>
                            <!-- Modal -->
                            <div class="modal fade" id="retweetmodal" role="dialog">
                                <div class="modal-dialog modal-lg" style="width: 650px; margin-top: 100px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" style="text-align: center">Retweet</h4>
                                        </div>
                                        <form id="rp" action=/neo4j-php-response-formatter-master/profile.php method="post">
                                            <div class="modal-body form-control" style="height:150px;">
                                                <textarea type="text" id="qw" class="form-control" name="Retweettext" rows="5" style="border-radius: 10px;" placeholder="very excited that #Baahubali2 will release in @IMAX format, which enhances the hugeness & the spirit of Baahubali..2"></textarea>
                                                <input type = "hidden" name="parentid" value="37">
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-success btn-info" value="retweet" name="retweet">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>                            
                        </p>
                    </div>
                </div>
                
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background-color: #1DA1F2;!important;font-weight: bolder;" > <p>Jami </p> </div><div class="panel-body">
                    <p style="text-align:center;">Don't know why people are after #messenger #hike also provide the same #One_Indian_App @datta<br>11</br>					
                        <button type="button"  data-toggle="modal" id="rt1" data-target="#retweetmodal2" style=" background-color: blue  margin: 10px;margin-left: -6;margin-top: 8px;">
		            	    <a id= "pk" style="color: white;text-decoration: none;"><img src="retweet.png" width="30px;" height="30px;"></a> 
		                </button>
                        <!-- Modal -->
                        <div class="modal fade" id="retweetmodal2" role="dialog">
                            <div class="modal-dialog modal-lg" style="width: 650px; margin-top: 100px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" style="text-align: center">Retweet</h4>
                                    </div>
                                    <form  id="rr" action=/neo4j-php-response-formatter-master/profile.php method="post">
                                        <div class="modal-body form-control" style="height:150px;">
                                            <textarea type="text" id="qa" class="form-control" name="Retweettext" rows="5" style="border-radius: 10px;" placeholder="Don't know why people are after #messenger #hike also provide the same #One_Indian_App @datta3"></textarea>
                                            <input type = "hidden" name="parentid" value="11">
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-success btn-info" value="retweet" name="retweet">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </p></div></div>			</div>
			<div class="col-xs-3">
			</div>
		</div>
	</div>
</body>

</html>




