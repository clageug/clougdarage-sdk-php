<?php

/**
 * Kaypair for CloudGarage
 */

namespace CloudGarage\Library\Keypair;

use CloudGarage\CloudGarage;
use CloudGarage\Library\Curl\CurlClient;
use CloudGarage\Library\Keypair;

class KeypairClient implements Keypair {

    private $curl;

    // get ContractList.
    public function get_keypairs($token)
    {
        $curl = new CurlClient(CloudGarage::BASE_URL.'/keypairs');
        $curl->set_auth_token_header($token);
        $curl->execute_method('GET');
        
        return $this->exec_curl($curl);
    }

    // get ContractDetail.
    public function get_detail($token, $keypair_id)
    {
        $curl = new CurlClient(CloudGarage::BASE_URL.'/keypairs/'.$keypair_id);
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
