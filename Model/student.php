<?php


class student {
    private $studentID, $password, $fName,  $lName, $additionLevel, $subtractionLevel, $multiplicationLevel,  $divisionLevel, $teacherID;
    function __construct($studentID, $password, $fName, $lName,  $additionLevel, $subtractionLevel, $multiplicationLevel,  $divisionLevel, $teacherID) {
        
        $this->studentID = $studentID;
        $this->password = $password;
        $this->fName = $fName;
        $this->lName = $lName;
        $this->additionLevel = $additionLevel;
        $this->subtractionLevel = $subtractionLevel;
        $this->multiplicationLevel = $multiplicationLevel;
        $this->divisionLevel = $divisionLevel;
        $this->teacherID = $teacherID;
        
        
    }
    function getStudentID() {
        return $this->studentID;
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

    function getAdditionLevel() {
        return $this->additionLevel;
    }

    function getSubtractionLevel() {
        return $this->subtractionLevel;
    }
    
    function getMultiplicationLevel() {
        return $this->multiplicationLevel;
    }

    function getDivisionLevel() {
        return $this->divisionLevel;
    }

    function getTeacherID() {
        return $this->teacherID;
    }
    
/* ------------------------------------------------------------------------------------------------------------- */
    
    function setStudentID($studentID) {
        $this->studentID = $studentID;
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

    function setAdditionLevel($additionLevel) {
        $this->additionLevel = $additionLevel;
    }

    function setSubtractionLevel($subtractionLevel) {
        $this->subtractionLevel = $subtractionLevel;
    }
    
    function setMultiplicationLevel($multiplicationLevel) {
        $this->multiplicationLevel = $multiplicationLevel;
    }

    function setDivisionLevel($divisionLevel) {
        $this->divisionLevel = $divisionLevel;
    }

    function setTeacherID($teacherID) {
        $this->teacherID = $teacherID;
    }
}
