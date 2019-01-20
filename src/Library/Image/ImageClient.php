<?php

/**
 * Image for CloudGarage
 */

namespace CloudGarage\Library\Image;

use CloudGarage\CloudGarage;
use CloudGarage\Library\Curl\CurlClient;
use CloudGarage\Library\Image;

class ImageClient implements Image {

    private $curl;

    // get ALL image list.
    public function get_images($token)
    {
        $curl = new CurlClient(CloudGarage::BASE_URL.'/images');
        $curl->set_auth_token_header($token);
        $curl->execute_method('GET');
        
        return $this->exec_curl($curl);
    }

    // get public image list.
    public function get_public_images($token)
    {
        $curl = new CurlClient(CloudGarage::BASE_URL.'/images/?imageType=public');
        $curl->set_auth_token_header($token);
        $curl->execute_method('GET');
        
        return $this->exec_curl($curl);
    }

    // get ContractDetail.
    public function get_backup_images($token)
    {
        $curl = new CurlClient(CloudGarage::BASE_URL.'/images/?imageType=backup');
        $curl->set_auth_token_header($token);
        $curl->execute_method('GET');
        
        return $this->exec_curl($curl);

    }

    private function exec_curl($curl)
    {
        $response = $curl->execute();

        if(strlen($curl->error()) !== 0) {
            print($curl->error());
            return false;
        } else {
            return json_decode($response, true);
        }
    }
}
