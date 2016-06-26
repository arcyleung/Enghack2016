<?php
  include 'loginLibrary/connection.php';
  include 'functions.php';
  $CompName = $_GET['comName'];
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
       <textarea name="input47" rows="3" cols="10">
       </textarea>
         <input type = "submit"   id = "postReview"  value = "Done !" name="postReview">
     </div>

    <br><br>
      <?php
      if(isset($_POST['post_review'])){
        post_review($_POST['post_review'],$link);}
      ?>
    </div>
  </body>
</html>