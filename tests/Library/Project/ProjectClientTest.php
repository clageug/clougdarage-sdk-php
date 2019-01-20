<?php
namespace CloudGarage\Tests;

use CloudGarage\CloudGarage;
use CloudGarage\Library\Curl\CurlClient;
use CloudGarage\Library\Project\ProjectClient;

/**
 * CloudGarage API Project Test
 */

class ProjectClientTest extends \PHPUnit\Framework\TestCase
{

    const ACTUAL='v1.0.0';

    function testget_version(){
        $this->Project = $this->createMock(ProjectClient::class);
        $this->Project
        ->expects($this->once())
        ->method('get_version')->willReturn('v1.0.0');

        $version = $this->Project->get_version();
        $this->assertEquals(self::ACTUAL, $version);
    }
}
