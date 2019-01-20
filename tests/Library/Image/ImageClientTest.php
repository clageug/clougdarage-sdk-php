<?php
namespace CloudGarage\Tests;

use CloudGarage\CloudGarage;
use CloudGarage\Library\Curl\CurlClient;
use CloudGarage\Library\Image\ImageClient;
use Phake;


/**
 * CloudGarage API Image Test
 */

class ImageClientTest extends \PHPUnit\Framework\TestCase
{
    const RETURN_LIST = array(
    "images" => array(
        array(
            "id" => "04a4ce3e-bfda-4a45-a5a2-XXXXX",
            "image_name" => "namexxxxx",
            "image_type" => "OS",
            "image_url" => "http =>//xxxxx/Linux/centos/6/isos/x86_64/xxxxx.iso",
            "os_distro" => "CENT_OS",
            "os_type" => "Linux",
            "os_version" => "6.10_64bit"
            )
        )
    );

    function testget_images(){
        $images = Phake::Mock(ImageClient::class);
        Phake::when($images)->get_images('test')->thenReturn(self::RETURN_LIST);
        
        $result = $images->get_images('test');

        $actual = '04a4ce3e-bfda-4a45-a5a2-XXXXX';
        $this->assertEquals($result['images'][0]['id'], $actual);
    }

    function testget_public_images(){
        $images = Phake::Mock(ImageClient::class);
        Phake::when($images)->get_images('test')->thenReturn(self::RETURN_LIST);
        
        $result = $images->get_images('test');

        $actual = '04a4ce3e-bfda-4a45-a5a2-XXXXX';
        $this->assertEquals($result['images'][0]['id'], $actual);
    }

    function testget_backup_images(){
        $images = Phake::Mock(ImageClient::class);
        Phake::when($images)->get_images('test')->thenReturn(self::RETURN_LIST);
        
        $result = $images->get_images('test');

        $actual = '04a4ce3e-bfda-4a45-a5a2-XXXXX';
        $this->assertEquals($result['images'][0]['id'], $actual);
    }
}