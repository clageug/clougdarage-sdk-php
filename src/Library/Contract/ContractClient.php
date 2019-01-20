<?php

/**
 * Contract for CloudGarage
 */

namespace CloudGarage\Library\Contract;

use CloudGarage\CloudGarage;
use CloudGarage\Library\Curl\CurlClient;
use CloudGarage\Library\Contract;

class ContractClient implements Contract {

    private $curl;

    // get ContractList.
    public function get_list($token)
    {
        $curl = new CurlClient(CloudGarage::BASE_URL.'/contracts');
        $curl->set_auth_token_header($token);
        $curl->execute_method('GET');
        
        return $this->exec_curl($curl);
    }

    // get ContractDetail.
    public function get_detail($token, $contract_id)
    {
        $curl = new CurlClient(CloudGarage::BASE_URL.'/contracts/'.$contract_id);
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
