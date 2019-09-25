<?php

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
        $userID = filter_input(INPUT_POST, 'uwerID');
        //getting student ID from db
        $id = student_db::get_student_by_id($studentID);
        $password = filter_input(INPUT_POST, 'password');
        //setting session for user
        $_SESSION['loggedInUser'] = $userID;
        
        include('view/studentProfile.php');
        die();
        break;
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
