<?php
  include 'loginLibrary/connection.php';
  include 'functions.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style/style_reviewform.css">
  </head>

  <body>  
  <div class="centering">
    <h1>Add a review for this employer</h1>

    <div id = "reviewtextarea">
    <textarea name="input47" rows="3" cols="10">
    Your multiline text is here.
    </textarea>
                <input type = "submit"   id = "postReview"  value = "Review" name="submit">
            </form>
    </div>

        <br><br>
          <?php
             if(isset($_POST['post_review'])){
              post_review($_POST['post_review'],$link);
             }
          ?>
        </form>

  </div>
  </body>
</html>