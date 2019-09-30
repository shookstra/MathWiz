<?php

class teacher {
    private $teacherID, $password, $fName,  $lName;
    function __construct($teacherID, $password, $fName, $lName) {
        
        $this->teacherID = $teacherID;
        $this->password = $password;
        $this->fName = $fName;
        $this->lName = $lName;
        
        
    }
    function getTeacherID() {
        return $this->teacherID;
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
    
    function setTeacherID($teacherID) {
        $this->teacherID = $teacherID;
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