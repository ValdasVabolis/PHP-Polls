<?php
  require_once dirname(__DIR__).'/poll/config/includes.php';
?>
<?php
  // VALDAS
  //
  // - index.php includes the form.php file, which is the poll.
  //
  // - the form.php submits to this file, so do the update of the json db here
  //
  // - below is the code which was working before our refactor yesterday - a lot has
  //   changed, but i thought it would be useful for reference
  //
  // - keep in mind you'll need to modify the Polls/Poll/Option classes we made yesterday,
  //   which are now located in ./poll/models/ to support incrementing scores in the instances
  //   when votes are made, as well as adding a function to persist the new json.
  //
  // - after a post to this page, the bottom call to the "header" function redirects
  //   back to the index.php page
  //
  // - admin.php is going to be broken - not refactored yet - but the important part is
  //   going to be getting poll submissions working, saving, etc. with the new approach.
  //.  my advise is to ignore the admin.php refactor until votes are working fully.
  //
  // 1) get Poll id from $_POST paramaters
  // 2) get Poll instance by id from Polls
  //
  // $option = "";
  // if(isset($_POST) && isset($_POST["option"])) {
  //   $option = $_POST["option"];
  // }
  // $data = json_decode(file_get_contents("polls.json", true));
  // echo $data;
  // $data->$option++;
  // $json = json_encode($data, JSON_PRETTY_PRINT);
  // echo $data->active_poll;

  // file_put_contents("polls.json", $json);

  // echo "Results: <br>";
  // echo "<ul>";

  // foreach($data as $key => $val) {
  //   echo "<li>" . $key . ": ";
  //   echo $val . "</li>";
  // }
  // echo "</ul>";

  $option = "";
  if(isset($_POST) && isset($_POST["option"])) {
    $option = $_POST["option"];
  }
  $contents = file_get_contents(DB_PATH, true);
  $data = json_decode($contents);
  echo '<pre>';
  print_r($data->polls[0]->options[0]);
  echo '</pre>';

  $poll = new Polls(DB_PATH);
  $poll = $poll->getPoll($hidden_poll_id);
  $option = $poll->getOption($option_id_chosen);
  $option->incrementScore();
  if($option->isValid()) {
    $poll->save();
  }



  // redirects back to home page
  //header("Location: index.php");
?>
