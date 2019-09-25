<?php


class teacher_db {
    public static function validate_teacher_login($teacherID) {
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
