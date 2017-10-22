<?php
  require_once dirname(__DIR__).'/poll/config/includes.php';

  $polls = new Polls(DB_PATH);
  $poll_active = $polls->getActivePoll();
  $poll_active_id = $poll_active->getId();
  $poll_active_options = $poll_active->getOptions();
?>



<div class="sidebar-poll">
  <form action="submit.php" method="post" class="sidebar-poll-form">
    <input type="hidden" value="<?php echo $poll_active_id ?>">

    <div class="sidebar-poll-title">
      <?php echo $poll_active->getTitle() ?>
    </div>

    <div class="sidebar-poll-options">
      <?php foreach($poll_active_options as $o) {
        $id = $o->getId();
        $label = $o->getLabel();
        $score = $o->getScore();
        echo "<input type='radio' name='option' id='{$id}' value='{$label}'>";
        echo "<label for='{$id}'>{$label}</label>";
        echo "<br>";
      } ?>
    </div>

    <div class="form-field">
      <input type="submit" value="Submit"></input>
    </div>
  </form>
</div>
