<?php
  class Option {
    private $data;

    public function __construct($data) {
      $this->data = $data;
    }

    public function getId() {
      return $this->data->id;
    }

    public function getLabel() {
      return $this->data->label;
    }

    public function getScore() {
      return $this->data->score;
    }

    public function incrementScore() {
      return $this->data->score++;
    }

    public function isValid() {
      return $this->data != null;
    }
  }
?>
