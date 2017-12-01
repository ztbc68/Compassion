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
<?php
    //only run code if form is submitted
    if(isset($_POST['update']))
    {
       	//define variables for sql statement
        $fname    = $_POST['fname'];
        $lname    = $_POST['lname'];
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $lat      = $_POST['lat'];
        $lng      = $_POST['lng'];

      	//check if email is already taken
        $query = mysqli_query($conn, "SELECT * from user where email='$email'");
        $num = mysqli_num_rows($query);
        if($num == 1)
        {
            echo "Email is already in use.";
        }
        else
        {
          //encrypt password
          $storepassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 7)); //higher cost, better security, more resources used
          
          //query database
          $sql = $conn->query("UPDATE Users SET fname = '{$fname}', lname = '{$lname}', email = '{$email}', password = '{$storepassword}', lat = '{$lat}', lng = '{$lng}' WHERE id=$userid");

          //redirect user after successful registration
          header('Location: account.php');
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
            
                
                <!-- <script type="text/javascript" src="/JS/jquery.js"></script>
                <script type="text/javascript" src="/JS/jquery-ui.js"></script> -->
                
                <!--JAVASCRIPT-->
                <script type="text/javascript">    
                function checkemail()
                {
                    var email = document.getElementById("email").value;
                    
                    if(email)
                        {
                            $.ajax
                            (
                                {
                                    type: 'post',
                                    url: 'checkemail.php',
                                    data: {email: email},
                                    success: function (response)
                                    {
                                        $( '#email_status' ).html(response);
                                        if(response=="OK")
                                            {
                                                return true;
                                            }
                                        else
                                            {
                                                return false;
                                            }
                                    }
                                }
                            )
                        }
                    else
                        {
                            $( '#email_status' ).html("");
                            return false;
                        }
                }
                </script>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12" id="center"><img src="./img/compassion_in_need_2.png" alt="Compassion in Need Logo" id="logo"></div>
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div id="homeContent">
                        <h2>Update</h2>
                        <form action="" method="post" name="RegisterForm" id="registerform">
                            
                            <input name="fname" type="text" required="required" class="tfield" id="fname" placeholder="First Name">
                            
                            
                            <input name="lname" type="text" required="required" class="tfield" id="lname" placeholder="Last Name"><br>
                            
                            
                            <input name="email" type="email" required="required" class="tfield" id="email" placeholder="Email" onkeyup="checkemail();"><br>
                            
                            
                            <input name="password" type="password" required="required" class="tfield" id="password" placeholder="Password"><br>

                            <button onclick="getLocation()">Get Location</button>

                            <script>
                                             
                            function getLocation() {
                                if (navigator.geolocation) {
                                    navigator.geolocation.getCurrentPosition(showPosition);
                                }
                            }

                            function showPosition(position) {
                                
                       
                                $('input#lat').val(position.coords.latitude);
                                $('input#lng').val(position.coords.longitude);
                            }
                            </script>

                            <input name="lat" type="text" required="required" class="tfield" id="lat" placeholder="Latitude">

                            <input name="lng" type="text" required="required" class="tfield" id="lng" placeholder="Longitude"><br>
                            
                            <input name="update" type="submit" class="button" id="update" value="Update">
                            
                        <form>
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
  </body>
</html>