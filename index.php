<!DOCTYPE html>
<html>
  <head>
    
  </head>
  <body>
    <?php
    if($_POST['url']) {
    ?>
  
    <?php } else { ?>
    <form action="/" method="POST">
      <label for="url">
      <input type="url" id="url" name="url">
    </form>
    <?php }
      ?>
  </body>
</html>
