<!DOCTYPE html>
<html>
  <head>
    <title>PHP-Polls</title>
  </head>
  <body>
    <h2>This is a poll</h2>
    <form action="/index.php" method="post">
      <input type="radio" name="option" value="A"> A <br>
      <input type="radio" name="option" value="B"> B <br>
      <input type="radio" name="option" value="C"> C <br>
      <br>
      <button type="submit">Submit</button>
    </form>
    <br>

    <?php
     $option = "";
     if(isset($_POST) && isset($_POST["option"])) {
        $option = $_POST["option"];
      }
      $data = json_decode(file_get_contents("votes.json", true));
      $data->$option++;
      $json = json_encode($data);
      file_put_contents("votes.json", $json);

    ?>
  </body>
</html>
