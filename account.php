<?php
require 'connections/dbconnect.php';
?>
<?php
session_start();

//if user logged in
if(isset($_SESSION["id"]))
{
}
else //user not logged in, redirect them to login
{
header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
      	<head>
            <title>Compassion In Need</title>
            <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="bootstrap.css">
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
            <script type="text/javascript" src="bootstrap.js"></script>
            <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
            <link rel="stylesheet" type="text/css" href="style.css">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta charset="UTF-8">
        
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
              	
        </head>
        <body>
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="https://www.compassioninneed.org" class="navbar-left navbar-brand"><img src="./img/compassion_in_need_logo.png" id="brand-image" alt="Website Logo"></a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-nav">
                        <ul class="nav navbar-nav">
                            <li><a href="https://www.compassioninneed.org/about.html"><i class="fa fa-info-circle" aria-hidden="true"></i> About</a></li>
                            <li><a href="https://www.compassioninneed.org/donate.html"><i class="fa fa-money" aria-hidden="true"></i> Donate</a></li>
                            <li><a href="#"><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Ideas</a></li>
                            <li><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i> Plans</a></li>
                            <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Events</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>
                            <li><a href="login.php"><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
			<a href="update.php">Update Account</a>
            <a href="logout.php">Logout</a><br>
                
                Account Number: <?php echo $_SESSION["id"]; ?><br>
                Name: <?php echo $_SESSION["fname"]; ?> <?php echo $_SESSION["lname"]; ?><br>
                Email: <?php echo $_SESSION["email"]; ?><br>
                Location: <?php echo $_SESSION["lat"]; ?>, <?php echo $_SESSION["lng"]; ?>
        </body>
</html>