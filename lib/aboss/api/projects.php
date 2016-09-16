<?php
namespace ABOSS;

require_once plugin_dir_path( __FILE__ ) . 'project.php';

class Projects {
  private $projects = [];

  public function __construct($apiKey, $mode, $agencyId = null) {
    $this->projects = $this->fetch($apiKey, $mode, $agencyId);
  }

  public function get() {
    return $this->projects;
  }

  private function fetch($apiKey, $system, $agencyId = null) {
    $url = $this->generateUrl($system, $agencyId);

    $ch = curl_init();

    // set Header, URL and other appropriate options
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , "Authorization: Bearer " . trim($apiKey)));
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // grab URL and pass it to the browser
    $curlOut = curl_exec($ch);

    // Decode JSON Response
    $response = json_decode($curlOut, true);

    if ($response && is_array($response)) {
      return array_map(function($project) {
        return $this->createProject($project);
      }, $response);
    } else {
      return [];
    }
  }

  private function createProject($data) {
    return new Project($data);
  }

  private function generateUrl($system, $agencyId = null) {
    switch ($system) {
      case 'artist':
        return 'https://data.a-boss.net/v1/artist/projects';
        break;
      case 'agency':
        return 'https://data.a-boss.net/v1/agency/' . $agencyId . '/projects';
        break;
    }

    if ($agencyId) {
      return 'https://data.a-boss.net/v1/agency/' . $agencyId . '/projects';
    }
  }
}
