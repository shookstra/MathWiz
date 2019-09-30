<?php

//NOTES TO GO OVER:    
//header.php, footer.php and nav.php do not work with the pages in the view folder, only on the index page
//Need to set a standard of vsriable names to make things easier for all of us
require_once 'model/student_db.php';

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'home';
    }
}
switch ($action) {
    case 'home': //default action set above if other action filters false.
        include('view/home.php');
        die();
        break;
    case 'viewStudent':
        include('view/studentProfile.php');
        die();
        break;
    case 'login':
        include('view/login.php');
        die();
        break;

    case 'loggedin':
        //this is for logged in. validations/checking and assigning sessions will go here. 
        //setting variables for user/password
        //getting the user type from the drop down menu
        $userType = filter_input(INPUT_POST, 'userType');
        //getting ID from form
        $userID = filter_input(INPUT_POST, 'userID');
        $password = filter_input(INPUT_POST, 'password');

        $errors = "";

        //getting user type from form for what kind of user is logging in
        if ($userType == 'student') {

            //getting student ID from db
            $student = student_db::get_student_by_id($userID);

            if ($password == $student->getPassword()) {
                //setting session for user
                $_SESSION['loggedInUser'] = $userID;
                include('view/studentProfile.php');                
            } else {
                $errors = "Incorrect login.";
                include('view/login.php');
            }            
            die();
            break;
        } else if ($userType == 'teacher') {

            //getting teacher ID from db
            $teacher = teacher_db::get_teacher_by_id($userID);
            //setting session for user
            $_SESSION['loggedInUser'] = $userID;

            include('view/teacherProfile.php');
            die();
            break;
        } else {
            //getting admin ID from db
            $admin = admin_db::get_admin_by_id($userID);
            //setting session for user
            $_SESSION['loggedInUser'] = $userID;

            include('view/adminProfile.php');
            die();
            break;
        }

    case 'drills' :
        include('view/drillPage.php');
        die();
        break;
    case 'tests' :
        include('view/tests.php');
        die();
        break;
}
?>
