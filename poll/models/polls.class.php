<?php
  class Polls {
    private $file;
    private $data;

    public function __construct($file) {
      $this->file = $file;
      $contents = file_get_contents($this->file, true);
      $this->data = json_decode($contents);
    }

    public function getActivePoll() {
      $id = $this->data->active_poll_id;
      return $this->getPoll($id);
    }

    public function getPolls() {
      $polls = array();
      for ($i = 0; $i < sizeof($this->data->polls); $i++) {
        $item = $this->data->polls[$i];
        array_push($polls, new Poll($item));
      }
      return $polls;
    }

    public function getPoll($id) {
      for ($i = 0; $i <= sizeof($this->data->polls); $i++) {
        $item = $this->data->polls[$i];
        if($item->id == $id) {
          return new Poll($item);
        }
      }
    }
  }
?>
