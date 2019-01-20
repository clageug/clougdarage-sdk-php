<?php

/**
 * Project for CloudGarage
 */

namespace CloudGarage\Library\Project;

use CloudGarage\CloudGarage;
use CloudGarage\Library\Project;
use CloudGarage\Library\Curl\CurlClient;

class ProjectClient implements Project {

    private $curl;

    // get CloudGarage API Version.
    public function get_version()
    {
        $curl = new CurlClient(CloudGarage::BASE_URL.'/version');
        $curl->execute_method('GET');
        
        $response = $curl->execute();

        if(strlen($curl->error()) !== 0) {
            print($curl->error());
            return false;
        } else {
            $result = json_decode($response, true);
            return $result['version'];
        }
    }
}
