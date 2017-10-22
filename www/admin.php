<?php
  define('DB_PATH', dirname(__DIR__).'/db/');
  echo '<pre>';
  dd(print_r(DB_PATH));
  echo '</pre>';
  require_once dirname(__DIR__).'/app/models/polls.php';
  require_once dirname(__DIR__).'/app/models/poll.php';
  require_once dirname(__DIR__).'/app/models/option.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>PHP-Polls</title>
  </head>
  <body>
    <?php
      $polls = new Polls("polls.json");
      $poll_objects = $polls->getPolls();
    ?>

    <ul>
      <?php
        for ($i=0; $i < sizeof($poll_objects); $i++) {
          $object = $poll_objects[$i];
          $options = $object->getOptions();
          echo "Title: " . $object->getTitle() . "<br>";
          for ($j=0; $j < sizeof($options); $j++) {
            $o = $options[$j];
            echo "&nbsp;&nbsp;Label: " . $o->getLabel() . "<br>";
            echo "&nbsp;&nbsp;Score: " . $o->getScore() . "<br>";
          }
          echo "<hr>";
        }
      ?>
    </ul>
  </body>
</html>

