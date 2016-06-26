<?php
  include 'loginLibrary/connection.php';
  include 'functions.php';

  session_start();
  $user = $_SESSION['login_user'];
  $CompName = $_GET['comName'];

  //echo $user;
?>

<!DOCTYPE html>
<html>
  <head>
      <link rel="stylesheet" type="text/css" href="style/style_reviewform.css">
      <link rel="stylesheet" type="text/css" href="style/style_main.css">
  </head>

  <body>  
    <div class="centering">
     <h1>Review for <br><?php echo $CompName?></h1>
     <div id = "reviewtextarea">
        <form method = "post" action = "">
            <textarea id = "review" name="input" rows="4" cols="50"></textarea>
            <br>
            <tr>
              <td><label>Select the rating:</label></td>
              <td>
                <select name="rating">
                <option value="0"> 0  goose</option>
                <option value="1"> 1  goose</option>
                <option value="2"> 2  goose</option>
                <option value="3"> 3  goose</option>
                <option value="4"> 4  goose</option>
                <option value="5"> 5  goose</option>
                <option value="6"> 6  goose</option>
                <option value="7"> 7  goose</option>
                <option value="8"> 8  goose</option>
                <option value="9"> 9  goose</option>
                <option value="10">10 goose</option>
              </select>
            </td>
            </tr>
            <br>
            <input type = "submit"  name="postReview" value = "Done !" >
        </form>
     </div>

    <br><br>
      <?php
      if(isset($_POST['input'])){
        $review =  htmlspecialchars($_POST['input']);
        //echo $review;
        $rating =  $_POST['rating'];
        //echo $rating;
        addReview($user,$CompName,$review,$rating,$link);
      }
      ?>
    </div>
  </body>
</html>