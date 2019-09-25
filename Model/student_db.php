<?php


class student_db {
    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM student';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $students = [];

        foreach ($rows as $value) {
            $students[$value['studentID']] = new student($value['studentID'], $value['password'], $value['fName'], $value['lName'], $value['additionLevel'], $value['subtractionLevel'],  $value['multiplicationLevel'], $value['divisionLevel'], $value['teacherID']);
        }
        $statement->closeCursor();

        return $students;
    }
	
	
	
public static function get_student_by_id($studentID) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM student
              WHERE studentID= :studentID';

        $statement = $db->prepare($query);
        $statement->bindValue(':studentID', $studentID);
        $statement->execute();
        $value = $statement->fetch();
        
        $students = new student($value['studentID'], $value['password'], $value['fName'], $value['lName'], $value['additionLevel'], $value['subtractionLevel'],  $value['multiplicationLevel'], $value['divisionLevel'], $value['teacherID']);
        
        $statement->closeCursor();

        return $students;
    }
	
	
	
public static function update_student($studentID, $fName, $lName, $additionLevel, $subtractionLevel, $multiplicationLevel, $divisionLevel, $teacherID) {
        

        $db = Database::getDB();
        $query = $query = 'UPDATE student
              SET fName = :fName,
                  lName = :lName,
                  additionLevel = :additionLevel,
                  subtractionLevel = :subtractionLevel,
                  multiplicationLevel = :multiplicationLevel,
                  divisionLevel = :divisionLevel,
                  teacherID = :teacherID
                WHERE studentID = :studentID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':fName', $fName);
            $statement->bindValue(':lName', $lName);
            $statement->bindValue(':additionLevel', $additionLevel);
            $statement->bindValue(':subtractionLevel', $subtractionLevel);
            $statement->bindValue(':multiplicationLevel', $multiplicationLevel);
            $statement->bindValue(':divisionLevel', $divisionLevel);
            $statement->bindValue(':studentDivLevel', $teacherID);
            $statement->bindValue(':teacherID', $studentID);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
	
	
	
public static function delete_by_ID($studentID) {
        $db = Database::getDB();
        $query = 'DELETE from student WHERE studentID= :studentID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':studentID', $studentID);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
	
    public static function validate_student_login($studentID) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM student
              WHERE studentID= :studentID';

        $statement = $db->prepare($query);
        $statement->bindValue(':studentID', $studentID);
        $statement->execute();
        $value = $statement->fetch();
        
        $theStudent = new student($value['studentID'], $value['password'], $value['fName'], $value['lName'], $value['additionLevel'], $value['subtractionLevel'],  $value['multiplicationLevel'], $value['divisionLevel'], $value['teacherID']);
        
        $statement->closeCursor();

        return $theStudent;
    }
}

