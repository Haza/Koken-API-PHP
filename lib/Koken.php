<?php
/**
 * @file
 * A minimal koken API PHP implementation.
 *
 * @package Koken
 */

class Koken {
  /**
   * API Constructor.
   *
   * @param string $koken_url
   *   The koken URL.
   * @param bool $test
   *   If set to test automatically, will return an Exception if the ping API
   *   call fails.
   */
  public function __construct($koken_url, $test = FALSE) {
    $this->base = $koken_url . '/api.php';
    if ($test === FALSE && !$this->test()) {
      throw new Exception('Cannot connect with the Koken API');
    }
  }

  /**
   * Perform an API call.
   */
  public function call($url) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt($ch, CURLOPT_URL, $this->base . $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt(
      $ch,
      CURLOPT_HTTPHEADER,
      array('Content-type: application/json')
    );
    curl_setopt($ch, CURLOPT_USERAGENT, 'MozillaXYZ/1.0');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    $output = curl_exec($ch);
    curl_close($ch);
    $decoded = json_decode($output);

    return is_null($decoded) ? $output : $decoded;
  }

  /**
   * Tests the API using /albums.
   *
   * @return bool
   *   Whether connection were successful.
   */
  public function test() {
    return $this->call('/albums');
  }
}
