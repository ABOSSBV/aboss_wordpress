<?php
namespace ABOSS;

class Event {
  protected $event;
  public function __construct($event) {
    $this->event = $event;
  }

  public function get($item) {
    if ($this->event[$item]) {
      return $this->event[$item];
    }

    return null;
  }
}
 ?>
