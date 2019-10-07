<?php


require_once 'model/student_db.php';
require_once 'model/teacher_db.php';
require_once 'model/admin_db.php';
require_once 'model/student.php';
require_once 'model/teacher.php';
require_once 'model/admin.php';

session_start();


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

//            echo var_dump($userType);
//            echo var_dump($userID);
//            echo var_dump($password);

            if ($password == null || $userID == null) {
                $errors = "Cannot have missing inputs.";
                include('view/login.php');
            } else if ($password == $student->getPassword()) {
                //setting session for user
                $_SESSION['loggedInUser'] = $student;
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
            //$_SESSION['loggedInUser'] = $userID;

            include('view/teacherProfile.php');
            die();
            break;
        } else {
            //getting admin ID from db
            $admin = admin_db::get_admin_by_id($userID);
            //setting session for user
            //$_SESSION['loggedInUser'] = $userID;

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
        $student = student_db::get_student_by_id($_SESSION['loggedInUser']->getStudentID());
        
        
        
      
        
        
        include('view/baseline.php');
        die();
        break;
    
    case 'commitResults' :
        $student = student_db::get_student_by_id($_SESSION['loggedInUser']->getStudentID());
        
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
        
        $addOneQuestions = [
		"1+1" => 2,
		"3+2" => 5,
		"5+1" => 6,
		"7+2" => 9,
		];
	
	$addTwoQuestions = [
		"10+10" => 20,
		"32+29" => 61,
		"74+41" => 115,
		"95+58" => 153,
		];
		
	$addThreeQuestions = [
		"101+229" => 330,
		"388+441" => 829,
		"774+390" => 1164,
		"999+752" => 1751,
		];
		
	$subOneQuestions = [
		"3-1" => 2,
		"5-2" => 3,
		"7-1" => 6,
		"9-0" => 9,
		];
	
	$subTwoQuestions = [
		"28-12" => 16,
		"75-25" => 50,
		"99-14" => 85,
		"72-58" => 14,
		];
		
	$subThreeQuestions = [
		"333-102" => 231,
		"582-385" => 197,
		"745-215" => 530,
		"999-588" => 411,
		];
		
	$multOneQuestions = [
		"2x1" => 2,
		"3x3" => 9,
		"7x6" => 42,
		"9x8" => 72,
		];
	
	$multTwoQuestions = [
		"11x13" => 143,
		"32x42" => 1344,
		"55x18" => 990,
		"97x68" => 6596,
		];
		
	$multThreeQuestions = [
		"105x118" => 12390,
		"395x222" => 87690,
		"632x539" => 340648,
		"955x666" => 636030,
		];
		
	$divOneQuestions = [
		"2/1" => 2,
		"4/2" => 2,
		"9/3" => 3,
		"8/2" => 4,
		];
		
	$divTwoQuestions = [
		"44/11" => 4,
		"99/33" => 3,
		"84/21" => 4,
		"96/32" => 3,
		];
	
	$divThreeQuestions = [
		"496/8" => 62,
		"306/6" => 51,
		"279/9" => 31,
		"612/6" => 102,
		];
	
	/*AddOne*/
        $ansEntAddOne1 = filter_input(INPUT_POST, 'ansAddOne1');
	$ansEntAddOne2 = filter_input(INPUT_POST, 'ansAddOne2');
	$ansEntAddOne3 = filter_input(INPUT_POST, 'ansAddOne3');
	$ansEntAddOne4 = filter_input(INPUT_POST, 'ansAddOne4');
	
	/*AddTwo;*/
	$ansEntAddTwo1 = filter_input(INPUT_POST, 'ansAddTwo1');
	$ansEntAddTwo2 = filter_input(INPUT_POST, 'ansAddTwo2');
	$ansEntAddTwo3 = filter_input(INPUT_POST, 'ansAddTwo3');
	$ansEntAddTwo4 = filter_input(INPUT_POST, 'ansAddTwo4');
	
	/*AddThree;*/
	$ansEntAddThree1 = filter_input(INPUT_POST, 'ansAddThree1');
	$ansEntAddThree2 = filter_input(INPUT_POST, 'ansAddThree2');
	$ansEntAddThree3 = filter_input(INPUT_POST, 'ansAddThree3');
	$ansEntAddThree4 = filter_input(INPUT_POST, 'ansAddThree4');
	
	/*SubOne;*/
	$ansEntSubOne1 = filter_input(INPUT_POST, 'ansSubOne1');
	$ansEntSubOne2 = filter_input(INPUT_POST, 'ansSubOne2');
	$ansEntSubOne3 = filter_input(INPUT_POST, 'ansSubOne3');
	$ansEntSubOne4 = filter_input(INPUT_POST, 'ansSubOne4');
	
	/*SubTwo;*/
	$ansEntSubTwo1 = filter_input(INPUT_POST, 'ansSubTwo1');
	$ansEntSubTwo2 = filter_input(INPUT_POST, 'ansSubTwo2');
	$ansEntSubTwo3 = filter_input(INPUT_POST, 'ansSubTwo3');
	$ansEntSubTwo4 = filter_input(INPUT_POST, 'ansSubTwo4');
	
	/*SubThree;*/
	$ansEntSubThree1 = filter_input(INPUT_POST, 'ansSubThree1');
	$ansEntSubThree2 = filter_input(INPUT_POST, 'ansSubThree2');
	$ansEntSubThree3 = filter_input(INPUT_POST, 'ansSubThree3');
	$ansEntSubThree4 = filter_input(INPUT_POST, 'ansSubThree4');
	
	/*MultOne;*/
	$ansMultOne1 = filter_input(INPUT_POST, 'ansMultOne1');
	$ansMultOne2 = filter_input(INPUT_POST, 'ansMultOne2');
	$ansMultOne3 = filter_input(INPUT_POST, 'ansMultOne3');
	$ansMultOne4 = filter_input(INPUT_POST, 'ansMultOne4');
	
	/*MultTwo;*/
	$ansMultTwo1 = filter_input(INPUT_POST, 'ansMultTwo1');
	$ansMultTwo2 = filter_input(INPUT_POST, 'ansMultTwo2');
	$ansMultTwo3 = filter_input(INPUT_POST, 'ansMultTwo3');
	$ansMultTwo4 = filter_input(INPUT_POST, 'ansMultTwo4');
	
	/*MultThree;*/
	$ansMultThree1 = filter_input(INPUT_POST, 'ansMultThree1');
	$ansMultThree2 = filter_input(INPUT_POST, 'ansMultThree2');
	$ansMultThree3 = filter_input(INPUT_POST, 'ansMultThree3');
	$ansMultThree4 = filter_input(INPUT_POST, 'ansMultThree4');
	
	/*DivOne;*/
	$ansDivOne1 = filter_input(INPUT_POST, 'ansDivOne1');
	$ansDivOne2 = filter_input(INPUT_POST, 'ansDivOne2');
	$ansDivOne3 = filter_input(INPUT_POST, 'ansDivOne3');
	$ansDivOne4 = filter_input(INPUT_POST, 'ansDivOne4');
	
	/*DivTwo;*/
	$ansDivTwo1 = filter_input(INPUT_POST, 'ansDivTwo1');
	$ansDivTwo2 = filter_input(INPUT_POST, 'ansDivTwo2');
	$ansDivTwo3 = filter_input(INPUT_POST, 'ansDivTwo3');
	$ansDivTwo4 = filter_input(INPUT_POST, 'ansDivTwo4');
	
	/*DivThree;*/
	$ansDivThree1 = filter_input(INPUT_POST, 'ansDivThree1');
	$ansDivThree2 = filter_input(INPUT_POST, 'ansDivThree2');
	$ansDivThree3 = filter_input(INPUT_POST, 'ansDivThree3');
	$ansDivThree4 = filter_input(INPUT_POST, 'ansDivThree4');
        
       if($ansEntAddOne1 == $addOneQuestions["1+1"]) {
	$addOneCount++;
        }

        if($ansEntAddOne2 == $addOneQuestions["3+2"]) {
	$addOneCount++;
        }

        if($ansEntAddOne3 == $addOneQuestions["5+1"]) {
	$addOneCount++;
        }

        if($ansEntAddOne4 == $addOneQuestions["7+2"]) {
	$addOneCount++;
        }

        /*---------------------------------------------*/

        if($ansEntAddTwo1 == $addTwoQuestions["10+10"]) {
	$addTwoCount++;
        }

        if($ansEntAddTwo2 == $addTwoQuestions["32+29"]) {
	$addTwoCount++;
        }

        if($ansEntAddTwo3 == $addTwoQuestions["74+41"]) {
	$addTwoCount++;
        }

        if($ansEntAddTwo4 == $addTwoQuestions["95+58"]) {
	$addTwoCount++;
        }

        /*---------------------------------------------*/

        if($ansEntAddThree1 == $addThreeQuestions["101+229"]) {
	$addThreeCount++;
        }

        if($ansEntAddThree2 == $addThreeQuestions["388+441"]) {
	$addThreeCount++;
        }

        if($ansEntAddThree3 == $addThreeQuestions["774+390"]) {
	$addThreeCount++;
        }

        if($ansEntAddThree4 == $addThreeQuestions["999+752"]) {
	$addThreeCount++;
        }		
	
        /*---------------------------------------------*/

        /*Sub*/
        if($ansEntSubOne1 == $subOneQuestions["3-1"]) {
	$subOneCount++;
        }

        if($ansEntSubOne2 == $subOneQuestions["5-2"]) {
	$subOneCount++;
        }

        if($ansEntSubOne3 == $subOneQuestions["7-1"]) {
	$subOneCount++;
        }

        if($ansEntSubOne4 == $subOneQuestions["9-0"]) {
	$subOneCount++;
        }			
	
			
        /*---------------------------------------------*/

        if($ansEntSubTwo1 == $subTwoQuestions["28-12"]) {
	$subTwoCount++;
        }

        if($ansEntSubTwo2 == $subTwoQuestions["75-25"]) {
	$subTwoCount++;
        }

        if($ansEntSubTwo3 == $subTwoQuestions["99-14"]) {
	$subTwoCount++;
        }

        if($ansEntSubTwo4 == $subTwoQuestions["72-58"]) {
	$subTwoCount++;
        }			
	
        /*---------------------------------------------*/

        if($ansEntSubThree1 == $subThreeQuestions["333-102"]) {
	$subThreeCount++;
        }

        if($ansEntSubThree2 == $subThreeQuestions["582-385"]) {
	$subThreeCount++;
        }

        if($ansEntSubThree3 == $subThreeQuestions["745-215"]) {
	$subThreeCount++;
        }

        if($ansEntSubThree4 == $subThreeQuestions["999-588"]) {
	$subThreeCount++;
        }				
	

        /*---------------------------------------------*/

        /*Mult*/
        if($ansMultOne1 == $multOneQuestions["2x1"]) {
	$multOneCount++;
        }

        if($ansMultOne2 == $multOneQuestions["3x3"]) {
	$multOneCount++;
        }

        if($ansMultOne3 == $multOneQuestions["7x6"]) {
	$multOneCount++;
        }   

        if($ansMultOne4 == $multOneQuestions["9x8"]) {
	$multOneCount++;
        }
	
	
        /*---------------------------------------------*/

        if($ansMultTwo1 == $multTwoQuestions["11x13"]) {
	$multTwoCount++;
        }

        if($ansMultTwo2 == $multTwoQuestions["32x42"]) {
	$multTwoCount++;
        }

        if($ansMultTwo3 == $multTwoQuestions["55x18"]) {
	$multTwoCount++;
        }

        if($ansMultTwo4 == $multTwoQuestions["97x68"]) {
	$multTwoCount++;
        }	
			
	
        /*---------------------------------------------*/

        if($ansMultThree1 == $multThreeQuestions["105x118"]) {
	$multThreeCount++;
        }

        if($ansMultThree2 == $multThreeQuestions["395x222"]) {
	$multThreeCount++;
        }

        if($ansMultThree3 == $multThreeQuestions["632x539"]) {
	$multThreeCount++;
        }

        if($ansMultThree4 == $multThreeQuestions["955x666"]) {
	$multThreeCount++;
        }	
		
	
        /*---------------------------------------------*/

        /*Div*/
        if($ansDivOne1 == $divOneQuestions["2/1"]) {
	$divOneCount++;
        }

        if($ansDivOne2 == $divOneQuestions["4/2"]) {
	$divOneCount++;
        }

        if($ansDivOne3 == $divOneQuestions["9/3"]) {
	$divOneCount++;
        }

        if($ansDivOne4 == $divOneQuestions["8/2"]) {
	$divOneCount++;
        }		
	
        /*---------------------------------------------*/

        if($ansDivTwo1 == $divTwoQuestions["44/11"]) {
	$divTwoCount++;
        }

        if($ansDivTwo2 == $divTwoQuestions["99/33"]) {
	$divTwoCount++;
        }

        if($ansDivTwo3 == $divTwoQuestions["84/21"]) {
	$divTwoCount++;
        }

        if($ansDivTwo4 == $divTwoQuestions["96/32"]) {
	$divTwoCount++;
        }	
	
        /*---------------------------------------------*/

        if($ansDivThree1 == $divThreeQuestions["496/8"]) {
	$divThreeCount++;
        }

        if($ansDivThree2 == $divThreeQuestions["306/6"]) {
	$divThreeCount++;
        }

        if($ansDivThree3 == $divThreeQuestions["279/9"]) {
	$divThreeCount++;
        }

        if($ansDivThree4 == $divThreeQuestions["612/6"]) {
	$divThreeCount++;
        }			
	
	
	
        if($addThreeCount >= 3 || $addTwoCount >= 3){
            $addLevel = 3;
        }else if($addOneCount >= 3) {
            $addLevel = 2;
        }else{
            $addLevel = 1;
        }
        
        if($subThreeCount >= 3 || $subTwoCount >= 3){
            $subLevel = 3;
		}else if($subOneCount >= 3) {
            $subLevel = 2;
        }else{
            $subLevel = 1;
        }

        
        if($multThreeCount >= 3 || $multTwoCount >= 3){
            $multLevel = 3;
        }else if($multOneCount >= 3) {
            $multLevel = 2;
        }else{
            $multLevel = 1;
        }
        
        if($divThreeCount >= 3 || $divTwoCount >= 3){
            $divLevel = 3;
        }else if($divOneCount >= 3) {
            $divLevel = 2;
        }else{
            $divLevel = 1;
        }
        var_dump($divThreeCount);
        var_dump($addOneCount);
        var_dump($addOneQuestions["1+1"]);
        var_dump($ansEntAddOne1);
        
        student_db::update_student($_SESSION['loggedInUser']->getStudentID(), $_SESSION['loggedInUser']->getFName(), $_SESSION['loggedInUser']->getLName(), $addLevel, $subLevel, $multLevel, $divLevel, $_SESSION['loggedInUser']->getTeacherID());
        
        include('view/results.php');
        die();
        break;
    case 'results';
        
    case 'logout':
        session_destroy();
        header("Refresh:0");
        include("view/home.php");
    case 'changePass':
        include('view/changePass.php');
        die();
        break;
}
?>
