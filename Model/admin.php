<?php

class admin {
    private $adminID, $password, $fName,  $lName;
    function __construct($adminID, $password, $fName, $lName) {
        
        $this->adminID = $adminID;
        $this->password = $password;
        $this->fName = $fName;
        $this->lName = $lName;
        
        
    }
    function getAdminID() {
        return $this->adminID;
    }

    function getPassword() {
        return $this->password;
    }

    function getFName() {
        return $this->fName;
    }

    function getLName() {
        return $this->lName;
    }
    
/* ------------------------------------------------------------------------------------------------------------- */
    
    function setAdminID($adminID) {
        $this->adminID = $adminID;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setFName($fName) {
        $this->fName = $fName;
    }

    function setLName($lName) {
        $this->lName = $lName;
    }

}
