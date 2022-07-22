<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * Validation functions
 */

/**
 * Function that checks a password containing at least :
 * 1 uppercase, 1 lowercase, 1 number, 1 special character and a length of at least 10
 * @param type $password
 * @return string
 */
function validate_password($password){
    if (preg_match('/^(?=.{10,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/', $password)) {
        return true; 
    } else { 
        return false; 
    }  
}

/**
 * Function that checks the validity of an email address
 * @param type $email
 * @return boolean
 */
function validate_email($email){
    if (preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/', $email)) {
        return true; } 
    else {
        return false; 
    }
}

/**
 * Function that checks the validity of an postal code
 * @param type $cp
 * @return boolean
 */
function validate_cp($cp){
    if (preg_match('/^[0-9]{5}$/', $cp)) {
        return true; } 
    else {
        return false; 
    }
}

/**
 * Function that checks the validity of a telephone number
 * @param type $telephone
 * @return boolean
 */
function validate_telephone($telephone){
    if (preg_match('/^[0]{1}[1-9]{1}[0-9]{8}$/', $telephone)) {
        return true; } 
    else {
        return false; 
    }
}