<?php
namespace ABOSS;

class Events {
  protected $events;

  public function __construct($apiKey, $projectId, $agencyId = null) {
    $this->events = $this->fetch($apiKey, $projectId, $agencyId);
  }

  public function get() {
    return $this->events;
  }

  private function fetch($apiKey, $projectId, $agencyId = null) {
    $api_key = trim($apiKey);
    $url = $this->generateUrl($projectId, $agencyId);
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
        return $this->createEvent($project);
      }, $response);
    } else {
      return [];
    }
  }

  private function createEvent($data) {
    return new Event($data);
  }

  private function generateUrl($projectId, $agencyId) {
    if ($agencyId) {
      $from       = date("Y-m-d");
      $to         = date('Y-m-d', strtotime(date("d-m-Y", time()) . " + 365 day"));
      if ($projectId) {
        $url = "https://data.a-boss.net/v1/agency/" . $agencyId . "/" . $projectId . "/public_events?from=" . $from . "&to=" . $to;
      } else {
        $url = "https://data.a-boss.net/v1/agency/" . $agencyId . "/public_events?from=" . $from . "&to=" . $to;
      }
    } else {
      $url = "https://data.a-boss.net/v1/artist/" . $projectId . "/public_events?from=" . $from . "&to=" . $to;
    }

    return $url;
  }
}
?>
