<?php

require_once '../Models/Pdo_euroforma.php';

use PHPUnit\Framework\TestCase;

class Pdo_euroformaTest extends TestCase {

    /**
     * @var Pdo_euroforma
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
//    protected function setUp():void{
//        $this->object = new Pdo_euroforma;
//    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
//    protected function tearDown():void{
//        
//    }

    /**
     * @covers Pdo_euroforma::getBdEuroforma
     * @todo   Implement testGetBdEuroforma().
     */
//    public function testGetBdEuroforma() {
//        // Remove the following lines when you implement this test.
//        $this->assertSame(3,5,'Pas ok');
//    }

    /**
     * @covers Pdo_euroforma::__destruct
     * @todo   Implement test__destruct().
     */
//    public function test__destruct() {
//        // Remove the following lines when you implement this test.
//        $this->markTestIncomplete(
//                'This test has not been implemented yet.'
//        );
//    }

    /**
     * @covers Pdo_euroforma::get_user_information
     * @todo   Implement testGet_user_information().
     */
//    public function testGet_user_information() {
//        // Remove the following lines when you implement this test.
//        $this->markTestIncomplete(
//                'This test has not been implemented yet.'
//        );
//    }

    /**
     * @covers Pdo_euroforma::get_all_users
     * @todo   Implement testGet_all_users().
     */
//    public function testGet_all_users() {
//        // Remove the following lines when you implement this test.
//        $this->markTestIncomplete(
//                'This test has not been implemented yet.'
//        );
//    }

   
    public function testGet_user() {
        $id = 1;
        $return = Pdo_euroforma::getBdEuroforma()->get_user($id);
        $this->assertNotNull($return);
        $this->assertEquals(1, $return["id"]);
        $this->assertEquals("SENEOR", $return["name"]);
        $this->assertEquals("Efrat", $return["forename"]);
    }
    
    public function testUpdate_user() {
        $id = 1;
        $return = Pdo_euroforma::getBdEuroforma()->get_user($id);
        $this->assertEquals(1, $return["id"]);
        $this->assertEquals("SENEOR", $return["name"]);
        $this->assertEquals("Efrat", $return["forename"]);
        $this->assertEquals(1, $return["is_admin"]);
        
        Pdo_euroforma::getBdEuroforma()->update_user($id, "Mme", "DUPONT", "Sarah", "dupontsarah@gmail.com", NULL, 1, 0);
        $returnUpdate = Pdo_euroforma::getBdEuroforma()->get_user($id);
        $this->assertEquals(1, $returnUpdate["id"]);
        $this->assertEquals("DUPONT", $returnUpdate["name"]);
        $this->assertEquals("Sarah", $returnUpdate["forename"]);
        $this->assertEquals(0, $returnUpdate["is_admin"]);  
        
        Pdo_euroforma::getBdEuroforma()->update_user($id, "Mme", "SENEOR", "Efrat", "efratseneor@gmail.com", NULL, 1, 1);
    }
    
}
