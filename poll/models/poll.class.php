<?php
  class Poll {
    private $data;
    private $options;

    public function __construct($data) {
      $this->data = $data;
      $opts = array();

      foreach ($this->data->options as $o) {
        array_push($opts, new Option($o));
      }
      $this->options = $opts;
    }

    public function getId() {
      return $this->data->id;
    }

    public function getTitle() {
      return $this->data->title;
    }

    public function getOptions() {
      return $this->options;
    }

  }
?>
