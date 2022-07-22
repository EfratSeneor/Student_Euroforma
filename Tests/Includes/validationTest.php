<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * Test of validation functions
 */

require_once '../Includes/validation.php';

use PHPUnit\Framework\TestCase;

class validationTest extends TestCase {

    function testValidate_email(){
        $this->assertTrue(validate_email("efratseneor@gmail.com"));
        $this->assertTrue(validate_email("es.2003@gmail.com"));
        $this->assertFalse(validate_email("efrat.gmail.com"));
    }
    
    function testValidate_password(){
        $this->assertFalse(validate_password("1234"));
        $this->assertFalse(validate_password("Azerty18"));
        $this->assertTrue(validate_password("Es26;18et52"));
        $this->assertTrue(validate_password("aZeRty/26.52"));
    }
    
    function testValidate_telephone(){
        $this->assertFalse(validate_telephone("1234"));
        $this->assertFalse(validate_telephone("016022578")); // 9 caracteres
        $this->assertFalse(validate_telephone("0016022578")); // 00
        $this->assertTrue(validate_telephone("0160225789"));
    }
    
    function testValidate_cp(){
        $this->assertFalse(validate_cp("abcde"));
        $this->assertFalse(validate_cp("123456")); // +
        $this->assertFalse(validate_cp("0160")); // -
        $this->assertTrue(validate_cp("77440"));
    }

}
