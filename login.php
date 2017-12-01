<?php require 'connections/dbconnect.php'; ?>
<?php
    //only run code if form is submitted
    if(isset($_POST['login']))
    {
  	//define variables for sql statement
        $email    = $_POST['email'];
        $password = $_POST['password'];

	//check entered data with database
	$result = $conn->query("SELECT * from user where email='$email'");

	//grab data after found from query
	$row = $result->fetch_array(MYSQLI_BOTH);

	echo $row[1];

	//verify password
	if(password_verify($password, $row['password']))
	{

	//start session
	session_start();

	//create session variables
	$_SESSION["id"] = $row['id'];
	$_SESSION["fname"] = $row['fname'];
	$_SESSION["lname"] = $row['lname'];
    $_SESSION["email"] = $row['email'];
    $_SESSION["lat"] = $row['lat'];
    $_SESSION["lng"] = $row['lng'];
	//$_SESSION["password"] = $row['password']

	//redirect to account
	header('Location: account.php');
	}else //login failed
	{
		session_start();
		$_SESSION["loginFail"] = "Yes";
	}
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
		<div class="container">
			<form action="" method="post" name="LoginForm" id="loginform">
            <?php if(isset($_SESSION["loginFail"])){ ?>
			<div>Login Failed! Please Try Again.</div>
			<?php } ?>
            <input name="email" type="email" required="required" class="tfield" id="email" placeholder="Email">
                    
            <input name="password" type="password" required="required" class="tfield" id="password" placeholder="Password">
                    
                    
            <input name="login" type="submit" class="button" id="login" value="Sign in">
			</form>
		</div>
	</body>
</html>