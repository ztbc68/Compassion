<?php
error_reporting( ~E_DEPRECATED & ~E_NOTICE );

define('DBHOST', '77.104.157.74');
define('DBUSER', 'zachar74_admin');
define('DBPASS', '5AcetoZiggy22');
define('DBNAME', 'zachar74_compassion');

$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

if(!$conn)
{
	die("Connection failed: " - mysqli_error());
}

?>
