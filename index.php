<!DOCTYPE html>
<html>
  <head>
    <title>Hello</title>
  </head>
  <body>
    <h2>This is a poll</h2>
    <form action="/index.php" method="post">
      <input type="radio" name="option" value="a"> A <br>
      <input type="radio" name="option" value="b"> B <br>
      <input type="radio" name="option" value="c"> C <br>
      <button type="submit">Submit</button>
    </form>

    <?php
      if(isset($_POST) && isset($_POST["option"])) {
        $option = $_POST["option"];
        echo "the last submitted option was " . $option;
      }
    ?>
  </body>
</html>
