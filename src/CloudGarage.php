<?php

namespace CloudGarage;

use CloudGarage\Library\Curl\CurlClient;

/**
 * ClientClass for CloudGarage
 */

class CloudGarage {

    // BASE URL ENDPOINT
    const BASE_URL="https://api.cloudgarage.jp";

    // private
    // API Keys

    /** @var string */
    private $client_key;
    /** @var string */
    private $client_secret;

    //token Key
    /** @var string */
    private $token_id;

    public function __construct($api_key, $api_secret) {
        $this->client_key = $api_key;
        $this->client_secret = $api_secret;

        $this->create_token();
    }

    public function create_token() {
        $data = array(
            'client_id' => $this->client_key,
            'client_secret' => $this->client_secret
        );

        $this->token_id = create_token_id($data);
    }

    public function get_token() {
        return $this->token_id;
    }

    private function create_token_id($data) {
        $curl = new CurlClient(self::BASE_URL.'/tokens');
        $curl->execute_method('POST');
        $curl->post_data($data);
        
        $response = $curl->execute();

        if(strlen($curl->error()) !== 0) {
            print($curl->error());
            return false;
        } else {
            $result = json_decode($response, true);
            return $result['token']['id'];
        }
    }
}
?>
