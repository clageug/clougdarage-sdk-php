<?php
namespace CloudGarage\Tests;

use CloudGarage\CloudGarage;
use CloudGarage\Library\Keypair\KeypairClient;
use Phake;

/**
 * CloudGarage API Keypair Test
 */
class KeypairClientTest extends \PHPUnit\Framework\TestCase
{
    const RESULT_LIST = array(
        "keypairs" => array(
            array(
                "id" => 123,
                "name" => "sshXXXXXX"
            )
        )
    );

    const RESULT_DETAIL = array(
        "keypair" => array(
            "id" => 123,
            "keypair_created_time" => "yyyy/MM/dd HH =>mm =>ss.SSS",
            "name" => "sshXXXXXX",
            "publicKey" => "ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQDGXXXXXXXX"
        )
    );

    function testget_keypairs(){
        $keypair = Phake::Mock(KeypairClient::class);
        Phake::when($keypair)->get_keypairs('test')->thenReturn(self::RESULT_LIST);
        
        $result = $keypair->get_keypairs('test');

        $actual = 123;
        $this->assertEquals($result['keypairs'][0]['id'], $actual);
    }

    function testget_detail(){
        $keypair = Phake::Mock(KeypairClient::class);
        Phake::when($keypair)->get_detail('test', 123)->thenReturn(self::RESULT_DETAIL);
        
        $result = $keypair->get_detail('test', 123);

        $actual = 'sshXXXXXX';
        $this->assertEquals($result['keypair']['name'], $actual);
    }
}
