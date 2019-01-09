<?php

/**
 * Curl for CloudGarage
 */

namespace CloudGarage\Library\Curl;

use CloudGarage\Library\Curl;

class CurlClient implements Curl {
    private $curl;

    private $header = array(
        'Content-Type: application/json',
    );

    // init class Require $url
    public function __construct($url) {
        $this->curl = curl_init($url);
    }

    // add X-Auth-Token Header
    public function set_auth_token_header($token) {
        array_push($this->header, 'X-Auth-Token: '.$token);
    }

    // method
    public function execute_method($method) {
        return curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, $method);
    }

    // add post date 
    public function post_data($data) {
        return curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($data));
    }

    // execute
    public function execute() {
        if (curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->header)) {
            curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
            return curl_exec($this->curl);
        } else {
            return null;
        }
    }

    // get info
    public function get_info() {
        return curl_getinfo($this->curl);
    }

    // error
    public function error() {
        return curl_error($this->curl);
    }

    // close
    public function __destruct() {
        curl_close($this->curl);
    }
}
