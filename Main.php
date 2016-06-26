<?php 
  include 'loginLibrary/connection.php';
  include 'loginLibrary/dologin.php';
  include 'functions.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style/style_main.css">
    <link rel="stylesheet" type="text/css" href="loginLibrary/login_style.css">
    <script type="text/javascript" src="loginLibrary/jquery.js"></script>
    <script type="text/javascript" src="loginLibrary/login_effect.js"></script>
  </head>

  <body>  

  <ul>
      <li><a>You are not logged in Yet</a></li>
  </ul>


  <div class="centering">
    <h1>UWGlass</h1>
    <input class = 'centering' type="button" id="show_login" value="Login">

    <div id = "loginform">
    <input type = "image" id = "close_login" src = "images/close.png">
            <form method = "post" action = "">
                <input class="centering2" type = "text"   id = "login"    placeholder = "Email Id" name = "uid"   value = "">
                <input class="centering2" type = "password" id = "password" placeholder = "Password" name = "upass" value = "">
                <input class="centering2" type = "submit"   id = "dologin"  value = "Login" name="submit">
            </form>
          
    </div>

        <br><br>
        <form method = "post" action = "">
          <input type = "text"  id = "searchBar" name="search"  placeholder="Search..">
          <br><br>
          <input type = "submit"  id = "dosearch"  value = "search" >
          <br>
          <?php
             if(isset($_POST['search'])){
              search($_POST['search'],$link);
              session_start();
             $_SESSION['login'] = 0;
             }
          ?>
        </form>

  </div>
  </body>
</html>
