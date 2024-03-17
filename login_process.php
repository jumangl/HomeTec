<?php
session_start();
include('db.php');
$pagename="Your Login Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
$email = $_POST['l_email'];
$password = $_POST['l_password'];

if (empty($email) or empty($password)){
    echo "<p><b>Login Failed!!</b>";
    echo "<br>Login Form Incomplete";
    echo "<br>Make sure you provide all the required details</p>";
    echo "<br><p> Go back to <a href=login.php>login</a></p>";
}

else{
    

}
echo "<p>Email: ".$email."</p>";
echo "<p>Password: ".$password."</p>";

include("footfile.html"); //include head layout
echo "</body>";
?>