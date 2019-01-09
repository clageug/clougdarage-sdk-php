<?php
namespace CloudGarage\Tests;

use CloudGarage\CloudGarage;
use CloudGarage\Library\Curl\CurlClient;

/**
 * CloudGarage API Base Test
 */

class CloudGarageTest extends \PHPUnit\Framework\TestCase
{
    function test__construct(){

        $this->cloudgarage = $this->createMock(CloudGarage::class);
        $this->cloudgarage
        ->expects($this->once())
        ->method('create_token');

        $api_key = 'api';
        $secret = 'secret';

        $this->cloudgarage->__construct($api_key, $secret);
    }
}
