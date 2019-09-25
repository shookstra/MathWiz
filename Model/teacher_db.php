<?php

        teacher;

        $teacherID;
	$password;
	$fName;
	$lName;

        teacherID;
	password;
	fName;
	lName;
        
class teacher_db {
    
    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM teacher';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $teacher = [];

        foreach ($rows as $value) {
            $teacher[$value['teacherID']] = new student($value['teacherID'], $value['password'], $value['$fName'], $value['lName']);
        }
        $statement->closeCursor();

        return $teacher;
    }
	
	
	
public static function get_teacher_by_id($teacherID) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM teacher
              WHERE teacherID= :teacherID';

        $statement = $db->prepare($query);
        $statement->bindValue(':teacherID', $teacherID);
        $statement->execute();
        $value = $statement->fetch();
        
        $teacher = new teacher($value['teacherID'], $value['password'], $value['$fName'], $value['lName']);
        
        $statement->closeCursor();

        return $teacher;
    }
	
	
	
	
	
public static function update_teacher($teacherID, $password, $fName, $lName) {
        

        $db = Database::getDB();
        $query = $query = 'UPDATE teacher
              SET fName = :fName,
                  lName = :studentLName,
                  password = :lName,
                WHERE teacherID = :teacherID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':password', $password);
            $statement->bindValue(':fName', $fName);
            $statement->bindValue(':lName', $lName);
            $statement->bindValue(':teacherID', $teacherID);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
	
	
	
public static function delete_by_ID($teacherID) {
        $db = Database::getDB();
        $query = 'DELETE from teacher WHERE teacherID= :teacherID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':teacherID', $teacherID);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    
    public static function validate_teacher_login($teacherID) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM teacher
              WHERE teacherID= :teacherID';

        $statement = $db->prepare($query);
        $statement->bindValue(':teacherID', $teacherID);
        $statement->execute();
        $value = $statement->fetch();
        
        $theTeacher = new teacher($value['teacherID'], $value['password'], $value['fName'], $value['lName']);

        $statement->closeCursor();

        return $theTeacher;
    }
}
