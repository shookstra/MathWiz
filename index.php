<?php

//NOTES TO GO OVER:    
//header.php, footer.php and nav.php do not work with the pages in the view folder, only on the index page
//Need to set a standard of vsriable names to make things easier for all of us

session_start();
require_once 'model/student_db.php';
require_once 'model/teacher_db.php';
require_once 'model/admin_db.php';
require_once 'model/student.php';
require_once 'model/teacher.php';
require_once 'model/admin.php';

//variables
$errors = '';
  
  
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
    case 'baseline' :
        $userID = $_SESSION['loggedInUser'];
        $userID = student_db::get_student($userID);
        
        $addOneCount = 0;
	$addTwoCount = 0;
	$addThreeCount = 0;
	$subOneCount = 0;
	$subTwoCount = 0;
	$subThreeCount = 0;
	$multOneCount = 0;
	$multTwoCount = 0;
	$multThreeCount = 0;
	$divOneCount = 0;
	$divTwoCount = 0;
	$divThreeCount = 0;
	
	AddOne;
	$ansEntAddOne1 = filter_input(INPUT_POST, 'ansAddOne1');
	$ansEntAddOne2 = filter_input(INPUT_POST, 'ansAddOne2');
	$ansEntAddOne3 = filter_input(INPUT_POST, 'ansAddOne3');
	$ansEntAddOne4 = filter_input(INPUT_POST, 'ansAddOne4');
	
	AddTwo;
	$ansEntAddTwo1 = filter_input(INPUT_POST, 'ansAddTwo1');
	$ansEntAddTwo2 = filter_input(INPUT_POST, 'ansAddTwo2');
	$ansEntAddTwo3 = filter_input(INPUT_POST, 'ansAddTwo3');
	$ansEntAddTwo4 = filter_input(INPUT_POST, 'ansAddTwo4');
	
	AddThree;
	$ansEntAddThree1 = filter_input(INPUT_Post, 'ansAddThree1');
	$ansEntAddThree2 = filter_input(INPUT_Post, 'ansAddThree2');
	$ansEntAddThree3 = filter_input(INPUT_Post, 'ansAddThree3');
	$ansEntAddThree4 = filter_input(INPUT_Post, 'ansAddThree4');
	
	SubOne;
	$ansEntSubOne1 = filter_input(INPUT_POST, 'ansSubOne1');
	$ansEntSubOne2 = filter_input(INPUT_POST, 'ansSubOne2');
	$ansEntSubOne3 = filter_input(INPUT_POST, 'ansSubOne3');
	$ansEntSubOne4 = filter_input(INPUT_POST, 'ansSubOne4');
	
	SubTwo;
	$ansEntSubTwo1 = filter_input(INPUT_POST, 'ansSubTwo1');
	$ansEntSubTwo2 = filter_input(INPUT_POST, 'ansSubTwo2');
	$ansEntSubTwo3 = filter_input(INPUT_POST, 'ansSubTwo3');
	$ansEntSubTwo4 = filter_input(INPUT_POST, 'ansSubTwo4');
	
	SubThree;
	$ansEntSubThree1 = filter_input(INPUT_POST, 'ansSubThree1');
	$ansEntSubThree2 = filter_input(INPUT_POST, 'ansSubThree2');
	$ansEntSubThree3 = filter_input(INPUT_POST, 'ansSubThree3');
	$ansEntSubThree4 = filter_input(INPUT_POST, 'ansSubThree4');
	
	MultOne;
	$ansMultOne1 = filter_input(INPUT_POST, 'ansMultOne1');
	$ansMultOne2 = filter_input(INPUT_POST, 'ansMultOne2');
	$ansMultOne3 = filter_input(INPUT_POST, 'ansMultOne3');
	$ansMultOne4 = filter_input(INPUT_POST, 'ansMultOne4');
	
	MultTwo;
	$ansMultTwo1 = filter_input(INPUT_POST, 'ansMultTwo1');
	$ansMultTwo2 = filter_input(INPUT_POST, 'ansMultTwo2');
	$ansMultTwo3 = filter_input(INPUT_POST, 'ansMultTwo3');
	$ansMultTwo4 = filter_input(INPUT_POST, 'ansMultTwo4');
	
	MultThree;
	$ansMultThree1 = filter_input(INPUT_POST, 'ansMultThree1');
	$ansMultThree2 = filter_input(INPUT_POST, 'ansMultThree2');
	$ansMultThree3 = filter_input(INPUT_POST, 'ansMultThree3');
	$ansMultThree4 = filter_input(INPUT_POST, 'ansMultThree4');
	
	DivOne;
	$ansDivOne1 = filter_input(INPUT_POST, 'ansDivOne1');
	$ansDivOne2 = filter_input(INPUT_POST, 'ansDivOne2');
	$ansDivOne3 = filter_input(INPUT_POST, 'ansDivOne3');
	$ansDivOne4 = filter_input(INPUT_POST, 'ansDivOne4');
	
	DivTwo;
	$ansDivTwo1 = filter_input(INPUT_POST, 'ansDivTwo1');
	$ansDivTwo2 = filter_input(INPUT_POST, 'ansDivTwo2');
	$ansDivTwo3 = filter_input(INPUT_POST, 'ansDivTwo3');
	$ansDivTwo4 = filter_input(INPUT_POST, 'ansDivTwo4');
	
	DivThree;
	$ansDivThree1 = filter_input(INPUT_POST, 'ansDivThree1');
	$ansDivThree2 = filter_input(INPUT_POST, 'ansDivThree2');
	$ansDivThree3 = filter_input(INPUT_POST, 'ansDivThree3');
	$ansDivThree4 = filter_input(INPUT_POST, 'ansDivThree4');
        
        Add
	(empty($ansEntAddOne1) ? $errorMessage['ansEntAddOne1'] = 'Please enter an answer' : 
		($ansEntAddOne1 == $addOneQuestions["1+1"] ?  $addOneCount++ : $errorMessage['ansEntAddOne1'] = 'Incorrect'));
	(empty($ansEntAddOne2) ? $errorMessage['ansEntAddOne2'] = 'Please enter an answer' : 
		($ansEntAddOne2 == $addOneQuestions["3+2"] ?  $addOneCount++ : $errorMessage['ansEntAddOne2'] = 'Incorrect'));
	(empty($ansEntAddOne3) ? $errorMessage['ansEntAddOne3'] = 'Please enter an answer' :
		($ansEntAddOne3 == $addOneQuestions["5+1"] ?  $addOneCount++ : $errorMessage['ansEntAddOne3'] = 'Incorrect'));
	(empty($ansEntAddOne4) ? $errorMessage['ansEntAddOne4'] = 'Please enter an answer' :
		($ansEntAddOne4 == $addOneQuestions["7+2"] ?  $addOneCount++ : $errorMessage['ansEntAddOne4'] = 'Incorrect'));
		
	(empty($ansEntAddTwo1) ? $errorMessage['ansEntAddTwo1'] = 'Please enter an answer' : 
		($ansEntAddTwo1 == $addTwoQuestions["10+10"] ?  $addTwoCount++ : $errorMessage['ansEntAddTwo1'] = 'Incorrect'));
	(empty($ansEntAddTwo2) ? $errorMessage['ansEntAddTwo2'] = 'Please enter an answer' : 
		($ansEntAddTwo2 == $addTwoQuestions["32+29"] ?  $addTwoCount++ : $errorMessage['ansEntAddTwo2'] = 'Incorrect'));
	(empty($ansEntAddTwo3) ? $errorMessage['ansEntAddTwo3'] = 'Please enter an answer' :
		($ansEntAddTwo3 == $addTwoQuestions["74+41"] ?  $addTwoCount++ : $errorMessage['ansEntAddTwo3'] = 'Incorrect'));
	(empty($ansEntAddTwo4) ? $errorMessage['ansEntAddTwo4'] = 'Please enter an answer' :
		($ansEntAddTwo4 == $addTwoQuestions["95+58"] ?  $addTwoCount++ : $errorMessage['ansEntAddTwo4'] = 'Incorrect'));
		
	(empty($ansEntAddThree1) ? $errorMessage['ansEntAddThree1'] = 'Please enter an answer' : 
		($ansEntAddThree1 == $addThreeQuestions["101+229"] ?  $addThreeCount++ : $errorMessage['ansEntAddThree1'] = 'Incorrect'));
	(empty($ansEntAddThree2) ? $errorMessage['ansEntAddThree2'] = 'Please enter an answer' : 
		($ansEntAddThree2 == $addThreeQuestions["388+441"] ?  $addThreeCount++ : $errorMessage['ansEntAddThree2'] = 'Incorrect'));
	(empty($ansEntAddThree3) ? $errorMessage['ansEntAddThree3'] = 'Please enter an answer' :
		($ansEntAddThree3 == $addThreeQuestions["774+390"] ?  $addThreeCount++ : $errorMessage['ansEntAddThree3'] = 'Incorrect'));
	(empty($ansEntAddThree4) ? $errorMessage['ansEntAddThree4'] = 'Please enter an answer' :
		($ansEntAddThree4 == $addThreeQuestions["999+752"] ?  $addThreeCount++ : $errorMessage['ansEntAddThree4'] = 'Incorrect'));
			
	Sub
	(empty($ansEntSubOne1) ? $errorMessage['ansEntSubOne1'] = 'Please enter an answer' : 
		($ansEntSubOne1 == $subOneQuestions["3-1"] ?  $subOneCount++ : $errorMessage['ansEntSubOne1'] = 'Incorrect'));
	(empty($ansEntSubOne2) ? $errorMessage['ansEntSubOne2'] = 'Please enter an answer' : 
		($ansEntSubOne2 == $subOneQuestions["5-2"] ?  $subOneCount++ : $errorMessage['ansEntSubOne2'] = 'Incorrect'));
	(empty($ansEntSubOne3) ? $errorMessage['ansEntSubOne3'] = 'Please enter an answer' :
		($ansEntSubOne3 == $subOneQuestions["7-1"] ?  $subOneCount++ : $errorMessage['ansEntSubOne3'] = 'Incorrect'));
	(empty($ansEntSubOne4) ? $errorMessage['ansEntSubOne4'] = 'Please enter an answer' :
		($ansEntSubOne4 == $subOneQuestions["9-0"] ?  $subOneCount++ : $errorMessage['ansEntSubOne4'] = 'Incorrect'));
	
	(empty($ansEntSubTwo1) ? $errorMessage['ansEntSubTwo1'] = 'Please enter an answer' : 
		($ansEntSubTwo1 == $subTwoQuestions["28-12"] ?  $subTwoCount++ : $errorMessage['ansEntSubTwo1'] = 'Incorrect'));
	(empty($ansEntSubTwo2) ? $errorMessage['ansEntSubTwo2'] = 'Please enter an answer' : 
		($ansEntSubTwo2 == $subTwoQuestions["75-25"] ?  $subTwoCount++ : $errorMessage['ansEntSubTwo2'] = 'Incorrect'));
	(empty($ansEntSubTwo3) ? $errorMessage['ansEntSubTwo3'] = 'Please enter an answer' :
		($ansEntSubTwo3 == $subTwoQuestions["99-14"] ?  $subTwoCount++ : $errorMessage['ansEntSubTwo3'] = 'Incorrect'));
	(empty($ansEntSubTwo4) ? $errorMessage['ansEntSubTwo4'] = 'Please enter an answer' :
		($ansEntSubTwo4 == $subTwoQuestions["72-58"] ?  $subTwoCount++ : $errorMessage['ansEntSubTwo4'] = 'Incorrect'));

	(empty($ansEntSubThree1) ? $errorMessage['ansEntSubThree1'] = 'Please enter an answer' : 
		($ansEntSubThree1 == $subThreeQuestions["333-102"] ?  $subThreeCount++ : $errorMessage['ansEntSubThree1'] = 'Incorrect'));
	(empty($ansEntSubThree2) ? $errorMessage['ansEntSubThree2'] = 'Please enter an answer' : 
		($ansEntSubThree2 == $subThreeQuestions["582-385"] ?  $subThreeCount++ : $errorMessage['ansEntSubThree2'] = 'Incorrect'));
	(empty($ansEntSubThree3) ? $errorMessage['ansEntSubThree3'] = 'Please enter an answer' :
		($ansEntSubThree3 == $subThreeQuestions["745-215"] ?  $subThreeCount++ : $errorMessage['ansEntSubThree3'] = 'Incorrect'));
	(empty($ansEntSubThree4) ? $errorMessage['ansEntSubThree4'] = 'Please enter an answer' :
		($ansEntSubThree4 == $subThreeQuestions["999-588"] ?  $subThreeCount++ : $errorMessage['ansEntSubThree4'] = 'Incorrect'));
	
	Mult
	(empty($ansMultOne1) ? $errorMessage['ansMultOne1'] = 'Please enter an answer' : 
		($ansMultOne1 == $multOneQuestions["2x1"] ?  $multOneCount++ : $errorMessage['ansMultOne1'] = 'Incorrect'));
	(empty($ansMultOne2) ? $errorMessage['ansMultOne2'] = 'Please enter an answer' : 
		($ansMultOne2 == $multOneQuestions["3x3"] ?  $multOneCount++ : $errorMessage['ansMultOne2'] = 'Incorrect'));
	(empty($ansMultOne3) ? $errorMessage['ansMultOne3'] = 'Please enter an answer' :
		($ansMultOne3 == $multOneQuestions["7x6"] ?  $multOneCount++ : $errorMessage['ansMultOne3'] = 'Incorrect'));
	(empty($ansMultOne4) ? $errorMessage['ansMultOne4'] = 'Please enter an answer' :
		($ansMultOne4 == $multOneQuestions["9x8"] ?  $multOneCount++ : $errorMessage['ansMultOne4'] = 'Incorrect'));		
	
	(empty($ansMultTwo1) ? $errorMessage['ansMultTwo1'] = 'Please enter an answer' : 
		($ansMultTwo1 == $multTwoQuestions["11x13"] ?  $multTwoCount++ : $errorMessage['ansMultTwo1'] = 'Incorrect'));
	(empty($ansMultTwo2) ? $errorMessage['ansMultTwo2'] = 'Please enter an answer' : 
		($ansMultTwo2 == $multTwoQuestions["32x42"] ?  $multTwoCount++ : $errorMessage['ansMultTwo2'] = 'Incorrect'));
	(empty($ansMultTwo3) ? $errorMessage['ansMultTwo3'] = 'Please enter an answer' :
		($ansMultTwo3 == $multTwoQuestions["55x18"] ?  $multTwoCount++ : $errorMessage['ansMultTwo3'] = 'Incorrect'));
	(empty($ansMultTwo4) ? $errorMessage['ansMultTwo4'] = 'Please enter an answer' :
		($ansMultTwo4 == $multTwoQuestions["97x68"] ?  $multTwoCount++ : $errorMessage['ansMultTwo4'] = 'Incorrect'));
		
	(empty($ansMultThree1) ? $errorMessage['ansMultThree1'] = 'Please enter an answer' : 
		($ansMultThree1 == $multThreeQuestions["105x118"] ?  $multThreeCount++ : $errorMessage['ansMultThree1'] = 'Incorrect'));
	(empty($ansMultThree2) ? $errorMessage['ansMultThree2'] = 'Please enter an answer' : 
		($ansMultThree2 == $multThreeQuestions["395x222"] ?  $multThreeCount++ : $errorMessage['ansMultThree2'] = 'Incorrect'));
	(empty($ansMultThree3) ? $errorMessage['ansMultThree3'] = 'Please enter an answer' :
		($ansMultThree3 == $multThreeQuestions["632x539"] ?  $multThreeCount++ : $errorMessage['ansMultThree3'] = 'Incorrect'));
	(empty($ansMultThree4) ? $errorMessage['ansMultThree4'] = 'Please enter an answer' :
		($ansMultThree4 == $multThreeQuestions["955x666"] ?  $multThreeCount++ : $errorMessage['ansMultThree4'] = 'Incorrect'));
		
	Div
	(empty($ansDivOne1) ? $errorMessage['ansDivOne1'] = 'Please enter an answer' : 
		($ansDivOne1 == $divOneQuestions["2/1"] ?  $divOneCount++ : $errorMessage['ansDivOne1'] = 'Incorrect'));
	(empty($ansDivOne2) ? $errorMessage['ansDivOne2'] = 'Please enter an answer' : 
		($ansDivOne2 == $divOneQuestions["4/2"] ?  $divOneCount++ : $errorMessage['ansDivOne2'] = 'Incorrect'));
	(empty($ansDivOne3) ? $errorMessage['ansDivOne3'] = 'Please enter an answer' :
		($ansDivOne3 == $divOneQuestions["9/3"] ?  $divOneCount++ : $errorMessage['ansDivOne3'] = 'Incorrect'));
	(empty($ansDivOne4) ? $errorMessage['ansDivOne4'] = 'Please enter an answer' :
		($ansDivOne4 == $divOneQuestions["8/2"] ?  $divOneCount++ : $errorMessage['ansDivOne4'] = 'Incorrect'));
	
	(empty($ansDivTwo1) ? $errorMessage['ansDivTwo1'] = 'Please enter an answer' : 
		($ansDivTwo1 == $divTwoQuestions["44/11"] ?  $divTwoCount++ : $errorMessage['ansDivTwo1'] = 'Incorrect'));
	(empty($ansDivTwo2) ? $errorMessage['ansDivTwo2'] = 'Please enter an answer' : 
		($ansDivTwo2 == $divTwoQuestions["99/33"] ?  $divTwoCount++ : $errorMessage['ansDivTwo2'] = 'Incorrect'));
	(empty($ansDivTwo3) ? $errorMessage['ansDivTwo3'] = 'Please enter an answer' :
		($ansDivTwo3 == $divTwoQuestions["84/21"] ?  $divTwoCount++ : $errorMessage['ansDivTwo3'] = 'Incorrect'));
	(empty($ansDivTwo4) ? $errorMessage['ansDivTwo4'] = 'Please enter an answer' :
		($ansDivTwo4 == $divTwoQuestions["96/32"] ?  $divTwoCount++ : $errorMessage['ansDivTwo4'] = 'Incorrect'));
		
	(empty($ansDivThree1) ? $errorMessage['ansDivThree1'] = 'Please enter an answer' : 
		($ansDivThree1 == $divThreeQuestions["496/8"] ?  $divThreeCount++ : $errorMessage['ansDivThree1'] = 'Incorrect'));
	(empty($ansDivThree2) ? $errorMessage['ansDivThree2'] = 'Please enter an answer' : 
		($ansDivThree2 == $divThreeQuestions["306/6"] ?  $divThreeCount++ : $errorMessage['ansDivThree2'] = 'Incorrect'));
	(empty($ansDivThree3) ? $errorMessage['ansDivThree3'] = 'Please enter an answer' :
		($ansDivThree3 == $divThreeQuestions["279/9"] ?  $divThreeCount++ : $errorMessage['ansDivThree3'] = 'Incorrect'));
	(empty($ansDivThree4) ? $errorMessage['ansDivThree4'] = 'Please enter an answer' :
		($ansDivThree4 == $divThreeQuestions["612/6"] ?  $divThreeCount++ : $errorMessage['ansDivThree4'] = 'Incorrect'));
		
	
	($addThreeCount >= 3 || $addTwoCount >= 3 ? $addLevel = 3 : 
		($addOneCount >= 3 ? $addLevel = 2 : $addLevel = 1));
			
	($subThreeCount >= 3 || $subTwoCount >= 3 ? $subLevel = 3 :
		($subOneCount >= 3 ? $subLevel = 2 : $subLevel = 1));
			
	($multThreeCount >= 3 || $multTwoCount >= 3 ? $multLevel = 3 :
		($multOneCount >= 3 ? $multLevel = 2 : $multLevel = 1));
		
	($divThreeCount >= 3 || $divTwoCount >= 3 ? $divLevel = 3 :
		($divOneCount >= 3 ? $divLevel = 2 : $divLevel = 1));
        
        
        
        include('view/baseline.php');
        die();
        break;
}
?>
