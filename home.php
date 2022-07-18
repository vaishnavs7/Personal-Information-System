<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: login.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login.php');
}
?>
<!doctype html>
<html><title>home</title>
<style>

.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
font-family:"Nexa"
box-shadow: 2px 2px;
}
body {background-color: powderblue;
font-family: Nexa;}
form{
position: fixed;
  top: 1;
  right:0;
  width: 200px;
 }

</style>

    <head></head>
    <body class="body">
       <center> <h1 font="Nexa">Homepage</h1> </center>
        <form method='post' action="">
            <input type="submit" value="Logout" name="but_logout">
        </form>
<br><br><br><center>
<a href="insert.php" class="button">INSERT</a>
<a href="view.php.php" class="button">VIEW</a>
<a href="search.html" class="button">SEARCH</a>
</center>
    </body>
</html>