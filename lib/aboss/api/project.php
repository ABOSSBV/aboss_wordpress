<?php
namespace ABOSS;

class Project {
  protected $data;
  public function __construct($project) {
    $this->data = $project;
  }

  public function get($item) {
    if ($this->data[$item]) {
      return $this->data[$item];
    }

    return null;
  }
}
 ?>
