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
            $students[$value['studentID']] = new student($value['studentID'], $value['pWord'], $value['studentFName'], $value['studentAddLevel'], $value['studentSubLevel'], $value['studentMultLevel'],  $value['studentDivLevel'], $value['teacherID']);
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
        
        $students = new student($value['studentID'], $value['studentFName'], $value['studentLName'], $value['studentAddLevel'], $value['studentSubLevel'], $value['studentMultLevel'],  $value['studentDivLevel'], $value['teacherID']);
        
        $statement->closeCursor();

        return $students;
    }
	
	
	
	
	
public static function update_student($studentID, $studentFName, $studentLName, $studentAddLevel, $studentSubLevel, $studentMultLevel, $studentDivLevel) {
        

        $db = Database::getDB();
        $query = $query = 'UPDATE student
              SET fName = :studentFName,
                  lName = :studentLName,
                  email = :studentAddLevel,
                  uName = :studentSubLevel,
                  uImage = :studentMultLevel,
				  uImage = :studentDivLevel
                WHERE studentID = :studentID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':studentFName', $studentFName);
            $statement->bindValue(':studentLName', $studentLName);
            $statement->bindValue(':studentAddLevel', $studentAddLevel);
            $statement->bindValue(':studentSubLevel', $studentSubLevel);
            $statement->bindValue(':studentMultLevel', $studentMultLevel);
            $statement->bindValue(':studentDivLevel', $studentDivLevel);
            $statement->bindValue(':studentID', $studentID);
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
        $query = 'DELETE from user WHERE studentID= :studentID';
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
        
        $theStudent = new student($value['studentID'], $value['studentFName'], $value['studentLName'], $value['studentAddLevel'], $value['studentSubLevel'], $value['studentMultLevel'], $value['studentDivLevel'], $value['studentPWord'], $value['teacherID']);

        $statement->closeCursor();

        return $theStudent;
    }
}

