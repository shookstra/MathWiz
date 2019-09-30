<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loginValidation
 *
 * @author sh615576
 */
class loginValidation {
    function validateID($id, $userType) {
        if ($userType == "student") {
            $studentID = student_db::get_student_by_id($id);
        } else if ($userType == "teacher") {
            teacher_db::validate_teacher_login($id);
        } else if ($userType == "admin"){
            admin_db::validate_admin_login($id);
        }
    }
    
    function validatePassword($password) {
        
    }
    
   
}
