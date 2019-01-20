<?php
namespace CloudGarage\Tests;

use CloudGarage\CloudGarage;
use CloudGarage\Library\Contract\ContractClient;
use Phake;

/**
 * CloudGarage API Contract Test
 */

class ContractClientTest extends \PHPUnit\Framework\TestCase
{

    const RETURN_LIST=array(
        'contracts' => array(
            array(            
                "contract_date_from"=> "yyyy/MM/dd",
                "contract_date_to"=> "yyyy/MM/dd",
                "contract_id" => 123,
                "contract_status" => "契約中",
                "product_name" => "C1",
                "used_server_count" => 0
            ),
        )
    );

    const RETURN_DETAIL=array(
        'contract' => array(
            "contract_date_from" => "yyyy/MM/dd",
            "contract_date_to" => "yyyy/MM/dd",
            "contract_id" => 123,
            "contract_status" => "契約中",
            "price" => 2959,
            "price_init" => 0,
            "product_description" => "商品情報",
            "product_name" => "C1",
            "resource_info" => array(
              "cpu_max" => 2,
              "cpu_used" => 1,
              "disk_max" => 100,
              "disk_used" => 50,
              "memory_max" => 4,
              "memory_used" => 2
            ),
            "used_server_count" => 3
        )
    );

    function testget_list(){
        $Contract = Phake::Mock(ContractClient::class);
        Phake::when($Contract)->get_list('test')->thenReturn(self::RETURN_LIST);
        
        $result = $Contract->get_list('test');

        $actual = '契約中';
        $this->assertEquals($result['contracts'][0]['contract_status'], $actual);
    }

    function testget_detail(){
        $Contract = Phake::Mock(ContractClient::class);
        Phake::when($Contract)->get_detail('test', 123)->thenReturn(self::RETURN_DETAIL);
        
        $result = $Contract->get_detail('test', 123);

        $actual = '契約中';
        $this->assertEquals($result['contract']['contract_status'], $actual);
    }
}
