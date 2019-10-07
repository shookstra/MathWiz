<?php

class admin_db {

    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM admin';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $admin = [];

        foreach ($rows as $value) {
            $admin[$value['adminID']] = new admin($value['adminID'], $value['password'], $value['$fName'], $value['lName']);
        }
        $statement->closeCursor();

        return $admin;
    }

    public static function get_admin_by_id($adminID) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM admin
              WHERE adminID= :adminID';

        $statement = $db->prepare($query);
        $statement->bindValue(':adminID', $adminID);
        $statement->execute();
        $value = $statement->fetch();

        $admin = new admin($value['adminID'], $value['password'], $value['fName'], $value['lName']);

        $statement->closeCursor();

        return $admin;
    }

    public static function update_admin($adminID, $password, $fName, $lName) {


        $db = Database::getDB();
        $query = $query = 'UPDATE admin
              SET fName = :fName,
                  lName = :lName,
                  password = :password,
                WHERE adminID = :adminID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':password', $password);
            $statement->bindValue(':fName', $fName);
            $statement->bindValue(':lName', $lName);
            $statement->bindValue(':adminID', $adminID);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function delete_by_ID($adminID) {
        $db = Database::getDB();
        $query = 'DELETE from teacher WHERE adminID= :adminID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':adminID', $adminID);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function validate_admin_login($adminID, $adminPassword) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM admin
              WHERE adminID= :adminID AND password= :adminPassword';

        $statement = $db->prepare($query);
        $statement->bindValue(':adminID', $adminID);
        $statement->bindValue(':password', $adminPassword);
        $statement->execute();
        $value = $statement->fetch();

        $theAdmin = new admin($value['adminID'], $value['password'], $value['fName'], $value['lName']);

        $statement->closeCursor();

        return $theAdmin;
    }

    public static function get_teacher_info($adminID, $adminPassword) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM admin
              WHERE adminID= :adminID AND password= :adminPassword';

        $statement = $db->prepare($query);
        $statement->bindValue(':adminID', $adminID);
        $statement->bindValue(':password', $adminPassword);
        $statement->execute();
        $value = $statement->fetch();

        $theAdmin = new admin($value['adminID'], $value['password'], $value['fName'], $value['lName']);

        $statement->closeCursor();

        return $theAdmin;
    }

    public static function teacher_numbers($teacherID) {
        $db = Database::getDB();
        $query = 'SELECT COUNT(student.studentID) AS "TotalStudents", (SUM(student.additionLevel)/COUNT(student.studentID) AS "totalAdditionLevel", (SUM(InvoiceTotal)/COUNT(InvoiceNum)) AS "invoiceAvg", UserName'
                . ' FROM invoices '
                . 'WHERE StoreIDNum = :storeIDNum '
                . 'GROUP BY StoreIDNum ';
        $statement = $db->prepare($query);
        $statement->bindValue(':storeIDNum', $storeIDNum);
        $statement->execute();
        $row = $statement->fetch();


        $invoiceNumbers[$row['UserName']] = new numbers(
                $row['UserName'], $row['invoiceTotals'], $row['invoiceAvg'], $row['invoiceCount']);

        $statement->closeCursor();
        return $invoiceNumbers;
    }

}
