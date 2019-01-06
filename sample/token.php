<?php

/**
 * CloudGarage API Sample (get token)
 */

require_once 'CloudGarage.php';

use CloudGarage\CloudGarage;

// api key
$api_key = '';
// api secret
$api_secret = '';

$cloudgarage = new CloudGarage($api_key, $api_secret);

print($cloudgarage->get_token());
