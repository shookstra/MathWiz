<?php
        studentID;
	studentPWord;
	studentFName;
	studentLName;
	studentAddLevel;
	studentSubLevel;
	studentMultLevel;
	studentDivLevel;
	teacherID;
        
        $studentID;
	$studentPWord;
	$studentFName;
	$studentLName;
	$studentAddLevel;
	$studentSubLevel;
	$studentMultLevel;
	$studentDivLevel;
	$teacherID;

class student {
    private $studentID, $studentPWord, $studentFName,  $studentLName, $studentAddLevel, $studentSubLevel, $studentMultLevel,  $studentDivLevel, $teacherID;
    function __construct($studentID, $studentPWord, $studentFName, $studentLName,  $studentAddLevel, $studentSubLevel, $studentMultLevel,  $studentDivLevel, $teacherID) {
        
        $this->studentID = $studentID;
        $this->studentPWord = $studentPWord;
        $this->studentFName = $studentFName;
        $this->studentLName = $studentLName;
        $this->studentAddLevel = $studentAddLevel;
        $this->studentSubLevel = $studentSubLevel;
        $this->studentMultLevel = $studentMultLevel;
        $this->studentDivLevel = $studentDivLevel;
        $this->teacherID = $teacherID;
        
        
    }
    function getStudentID() {
        return $this->studentID;
    }

    function getStudentPWord() {
        return $this->studentPWord;
    }

    function getStudentFName() {
        return $this->studentFName;
    }

    function getStudentLName() {
        return $this->studentLName;
    }

    function getStudentAddLevel() {
        return $this->studentAddLevel;
    }

    function getStudentSubLevel() {
        return $this->studentSubLevel;
    }
    
    function getStudentMultLevel() {
        return $this->studentMultLevel;
    }

    function getStudentDivLevel() {
        return $this->studentDivLevel;
    }

    function getTeacherID() {
        return $this->teacherID;
    }
    
/* ------------------------------------------------------------------------------------------------------------- */
    
    function setStudentID($studentID) {
        $this->studentID = $studentID;
    }

    function setStudentPWord($studentPWord) {
        $this->studentPWord = $studentPWord;
    }

    function setStudentFName($studentFName) {
        $this->studentFName = $studentFName;
    }

    function setStudentLName($studentLName) {
        $this->studentLName = $studentLName;
    }

    function setStudentAddLevel($studentAddLevel) {
        $this->studentAddLevel = $studentAddLevel;
    }

    function setStudentSubLevel($studentSubLevel) {
        $this->studentSubLevel = $studentSubLevel;
    }
    
    function setStudentMultLevel($studentMultLevel) {
        $this->studentMultLevel = $studentMultLevel;
    }

    function setStudentDivLevel($studentDivLevel) {
        $this->studentDivLevel = $studentDivLevel;
    }

    function setTeacherID($teacherID) {
        $this->teacherID = $teacherID;
    }
}
