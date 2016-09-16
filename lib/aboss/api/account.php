<?php
namespace ABOSS;

class Account {
  protected $account;
  public function __construct($apiKey) {
    $this->account = $this->fetch($apiKey);
  }

  private function fetch($apiKey) {
    $url = "https://data.a-boss.net/v1/me";
    $ch = curl_init();

    // set Header, URL and other appropriate options
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , "Authorization: Bearer " . trim($apiKey)));
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // grab URL and pass it to the browser
    $curlOut = curl_exec($ch);

    // Decode JSON Response
    return json_decode($curlOut, true);
  }

  public function get($item) {
    if ($this->account[$item]) {
      return $this->account[$item];
    }

    return null;
  }
}

 ?>
