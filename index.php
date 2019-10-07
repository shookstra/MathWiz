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
    case 'profile':
        if ($_SESSION['userType'] == "student") {
            include('view/studentProfile.php');
        } else if ($_SESSION['userType'] == "teacher") {
            include('view/teacherProfile.php');
        }

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

            if ($password == null || $userID == null) {
                $errors = "Cannot have missing inputs.";
                include('view/login.php');
            } else if ($password == $student->getPassword()) {
                //setting session for user
                $_SESSION['loggedInUser'] = $student;
                $_SESSION['userType'] = $userType;
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
            if ($password == null || $userID == null) {
                $errors = "Cannot have missing inputs.";
                include('view/login.php');
            } else if ($password == $teacher->getPassword()) {
                //setting session for user
                $_SESSION['loggedInUser'] = $teacher;
                $_SESSION['userType'] = $userType;
                include('view/teacherProfile.php');
            } else {
                $errors = "Incorrect login.";
                include('view/login.php');
            }
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


        $questions = [
            "1+1" => 2,
            "3+2" => 5,
            "5+1" => 6,
            "7+2" => 9,
            "10+10" => 20,
            "32+29" => 61,
            "74+41" => 115,
            "95+58" => 153,
            "101+229" => 330,
            "388+441" => 829,
            "774+390" => 1164,
            "999+752" => 1751,
            "3-1" => 2,
            "5-2" => 3,
            "7-1" => 6,
            "9-0" => 9,
            "28-12" => 16,
            "75-25" => 50,
            "99-14" => 85,
            "72-58" => 14,
            "333-102" => 231,
            "582-385" => 197,
            "745-215" => 530,
            "999-588" => 411,
            "2x1" => 2,
            "3x3" => 9,
            "7x6" => 42,
            "9x8" => 72,
            "11x13" => 143,
            "32x42" => 1344,
            "55x18" => 990,
            "97x68" => 6596,
            "105x118" => 12390,
            "395x222" => 87690,
            "632x539" => 340648,
            "955x666" => 636030,
            "2/1" => 2,
            "4/2" => 2,
            "9/3" => 3,
            "8/2" => 4,
            "44/11" => 4,
            "99/33" => 3,
            "84/21" => 4,
            "96/32" => 3,
            "496/8" => 62,
            "306/6" => 51,
            "279/9" => 31,
            "612/6" => 102,
        ];

        $answers01 = $questions["1+1"];
        $answers02 = $questions["3+2"];
        $answers03 = $questions["5+1"];
        $answers04 = $questions["7+2"];
        $answers05 = $questions["10+10"];
        $answers06 = $questions["32+29"];
        $answers07 = $questions["74+41"];
        $answers08 = $questions["95+58"];
        $answers09 = $questions["101+229"];
        $answers10 = $questions["388+441"];
        $answers11 = $questions["774+390"];
        $answers12 = $questions["999+752"];
        $answers13 = $questions["3-1"];
        $answers14 = $questions["5-2"];
        $answers15 = $questions["7-1"];
        $answers16 = $questions["9-0"];
        $answers17 = $questions["28-12"];
        $answers18 = $questions["75-25"];
        $answers19 = $questions["99-14"];
        $answers20 = $questions["72-58"];
        $answers21 = $questions["333-102"];
        $answers22 = $questions["582-385"];
        $answers23 = $questions["745-215"];
        $answers24 = $questions["999-588"];
        $answers25 = $questions["2x1"];
        $answers26 = $questions["3x3"];
        $answers27 = $questions["7x6"];
        $answers28 = $questions["9x8"];
        $answers29 = $questions["11x13"];
        $answers30 = $questions["32x42"];
        $answers31 = $questions["55x18"];
        $answers32 = $questions["97x68"];
        $answers33 = $questions["105x118"];
        $answers34 = $questions["395x222"];
        $answers35 = $questions["632x539"];
        $answers36 = $questions["955x666"];
        $answers37 = $questions["2/1"];
        $answers38 = $questions["4/2"];
        $answers39 = $questions["9/3"];
        $answers40 = $questions["8/2"];
        $answers41 = $questions["44/11"];
        $answers42 = $questions["99/33"];
        $answers43 = $questions["84/21"];
        $answers44 = $questions["96/32"];
        $answers45 = $questions["496/8"];
        $answers46 = $questions["306/6"];
        $answers47 = $questions["279/9"];
        $answers48 = $questions["612/6"];



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

        $questions = [
            "1+1" => 2,
            "3+2" => 5,
            "5+1" => 6,
            "7+2" => 9,
            "10+10" => 20,
            "32+29" => 61,
            "74+41" => 115,
            "95+58" => 153,
            "101+229" => 330,
            "388+441" => 829,
            "774+390" => 1164,
            "999+752" => 1751,
            "3-1" => 2,
            "5-2" => 3,
            "7-1" => 6,
            "9-0" => 9,
            "28-12" => 16,
            "75-25" => 50,
            "99-14" => 85,
            "72-58" => 14,
            "333-102" => 231,
            "582-385" => 197,
            "745-215" => 530,
            "999-588" => 411,
            "2x1" => 2,
            "3x3" => 9,
            "7x6" => 42,
            "9x8" => 72,
            "11x13" => 143,
            "32x42" => 1344,
            "55x18" => 990,
            "97x68" => 6596,
            "105x118" => 12390,
            "395x222" => 87690,
            "632x539" => 340648,
            "955x666" => 636030,
            "2/1" => 2,
            "4/2" => 2,
            "9/3" => 3,
            "8/2" => 4,
            "44/11" => 4,
            "99/33" => 3,
            "84/21" => 4,
            "96/32" => 3,
            "496/8" => 62,
            "306/6" => 51,
            "279/9" => 31,
            "612/6" => 102,
        ];

        $answers01 = $questions["1+1"];
        $answers02 = $questions["3+2"];
        $answers03 = $questions["5+1"];
        $answers04 = $questions["7+2"];
        $answers05 = $questions["10+10"];
        $answers06 = $questions["32+29"];
        $answers07 = $questions["74+41"];
        $answers08 = $questions["95+58"];
        $answers09 = $questions["101+229"];
        $answers10 = $questions["388+441"];
        $answers11 = $questions["774+390"];
        $answers12 = $questions["999+752"];
        $answers13 = $questions["3-1"];
        $answers14 = $questions["5-2"];
        $answers15 = $questions["7-1"];
        $answers16 = $questions["9-0"];
        $answers17 = $questions["28-12"];
        $answers18 = $questions["75-25"];
        $answers19 = $questions["99-14"];
        $answers20 = $questions["72-58"];
        $answers21 = $questions["333-102"];
        $answers22 = $questions["582-385"];
        $answers23 = $questions["745-215"];
        $answers24 = $questions["999-588"];
        $answers25 = $questions["2x1"];
        $answers26 = $questions["3x3"];
        $answers27 = $questions["7x6"];
        $answers28 = $questions["9x8"];
        $answers29 = $questions["11x13"];
        $answers30 = $questions["32x42"];
        $answers31 = $questions["55x18"];
        $answers32 = $questions["97x68"];
        $answers33 = $questions["105x118"];
        $answers34 = $questions["395x222"];
        $answers35 = $questions["632x539"];
        $answers36 = $questions["955x666"];
        $answers37 = $questions["2/1"];
        $answers38 = $questions["4/2"];
        $answers39 = $questions["9/3"];
        $answers40 = $questions["8/2"];
        $answers41 = $questions["44/11"];
        $answers42 = $questions["99/33"];
        $answers43 = $questions["84/21"];
        $answers44 = $questions["96/32"];
        $answers45 = $questions["496/8"];
        $answers46 = $questions["306/6"];
        $answers47 = $questions["279/9"];
        $answers48 = $questions["612/6"];

        /* AddOne */
        $ansEntAddOne1 = filter_input(INPUT_POST, 'answer01');
        $ansEntAddOne2 = filter_input(INPUT_POST, 'answer02');
        $ansEntAddOne3 = filter_input(INPUT_POST, 'answer03');
        $ansEntAddOne4 = filter_input(INPUT_POST, 'answer04');

        /* AddTwo; */
        $ansEntAddTwo1 = filter_input(INPUT_POST, 'answer05');
        $ansEntAddTwo2 = filter_input(INPUT_POST, 'answer06');
        $ansEntAddTwo3 = filter_input(INPUT_POST, 'answer07');
        $ansEntAddTwo4 = filter_input(INPUT_POST, 'answer08');

        /* AddThree; */
        $ansEntAddThree1 = filter_input(INPUT_POST, 'answer09');
        $ansEntAddThree2 = filter_input(INPUT_POST, 'answer10');
        $ansEntAddThree3 = filter_input(INPUT_POST, 'answer11');
        $ansEntAddThree4 = filter_input(INPUT_POST, 'answer12');

        /* SubOne; */
        $ansEntSubOne1 = filter_input(INPUT_POST, 'answer13');
        $ansEntSubOne2 = filter_input(INPUT_POST, 'answer14');
        $ansEntSubOne3 = filter_input(INPUT_POST, 'answer15');
        $ansEntSubOne4 = filter_input(INPUT_POST, 'answer16');

        /* SubTwo; */
        $ansEntSubTwo1 = filter_input(INPUT_POST, 'answer17');
        $ansEntSubTwo2 = filter_input(INPUT_POST, 'answer18');
        $ansEntSubTwo3 = filter_input(INPUT_POST, 'answer19');
        $ansEntSubTwo4 = filter_input(INPUT_POST, 'answer20');

        /* SubThree; */
        $ansEntSubThree1 = filter_input(INPUT_POST, 'answer21');
        $ansEntSubThree2 = filter_input(INPUT_POST, 'answer22');
        $ansEntSubThree3 = filter_input(INPUT_POST, 'answer23');
        $ansEntSubThree4 = filter_input(INPUT_POST, 'answer24');

        /* MultOne; */
        $ansMultOne1 = filter_input(INPUT_POST, 'answer25');
        $ansMultOne2 = filter_input(INPUT_POST, 'answer26');
        $ansMultOne3 = filter_input(INPUT_POST, 'answer27');
        $ansMultOne4 = filter_input(INPUT_POST, 'answer28');

        /* MultTwo; */
        $ansMultTwo1 = filter_input(INPUT_POST, 'answer29');
        $ansMultTwo2 = filter_input(INPUT_POST, 'answer30');
        $ansMultTwo3 = filter_input(INPUT_POST, 'answer31');
        $ansMultTwo4 = filter_input(INPUT_POST, 'answer32');

        /* MultThree; */
        $ansMultThree1 = filter_input(INPUT_POST, 'answer33');
        $ansMultThree2 = filter_input(INPUT_POST, 'answer34');
        $ansMultThree3 = filter_input(INPUT_POST, 'answer35');
        $ansMultThree4 = filter_input(INPUT_POST, 'answer36');

        /* DivOne; */
        $ansDivOne1 = filter_input(INPUT_POST, 'answer37');
        $ansDivOne2 = filter_input(INPUT_POST, 'answer38');
        $ansDivOne3 = filter_input(INPUT_POST, 'answer39');
        $ansDivOne4 = filter_input(INPUT_POST, 'answer40');

        /* DivTwo; */
        $ansDivTwo1 = filter_input(INPUT_POST, 'answer41');
        $ansDivTwo2 = filter_input(INPUT_POST, 'answer42');
        $ansDivTwo3 = filter_input(INPUT_POST, 'answer43');
        $ansDivTwo4 = filter_input(INPUT_POST, 'answer44');

        /* DivThree; */
        $ansDivThree1 = filter_input(INPUT_POST, 'answer45');
        $ansDivThree2 = filter_input(INPUT_POST, 'answer46');
        $ansDivThree3 = filter_input(INPUT_POST, 'answer47');
        $ansDivThree4 = filter_input(INPUT_POST, 'answer48');

        if ($ansEntAddOne1 == "" || $ansEntAddOne1 == NULL) {
            $errorMessage['answer01'] = 'Please enter an answer';
        } else if ($ansEntAddOne1 == $answers01) {
            $addOneCount++;
        } else {
            $wrong["1+1"] = $ansEntAddOne1;
        }

        if ($ansEntAddOne2 == "" || $ansEntAddOne2 == NULL) {
            $errorMessage['answer02'] = 'Please enter an answer';
        } else if ($ansEntAddOne2 == $answers02) {
            $addOneCount++;
        } else {
            $wrong["1+1"] = $ansEntAddOne2;
        }

        if ($ansEntAddOne3 == "" || $ansEntAddOne3 == NULL) {
            $errorMessage['answer03'] = 'Please enter an answer';
        } else if ($ansEntAddOne3 == $answers03) {
            $addOneCount++;
        } else {
            $wrong["5+1"] = $ansEntAddOne3;
        }

        if ($ansEntAddOne4 == "" || $ansEntAddOne4 == NULL) {
            $errorMessage['answer04'] = 'Please enter an answer';
        } else if ($ansEntAddOne4 == $answers04) {
            $addOneCount++;
        } else {
            $wrong["7+2"] = $ansEntAddOne2;
        }


        /* --------------------------------------------- */


        if ($ansEntAddTwo1 == "" || $ansEntAddTwo1 == NULL) {
            $errorMessage['answer05'] = 'Please enter an answer';
        } else if ($ansEntAddTwo1 == $answers05) {
            $addTwoCount++;
        } else {
            $wrong["10+10"] = $ansEntAddTwo1;
        }

        if ($ansEntAddTwo2 == "" || $ansEntAddTwo2 == NULL) {
            $errorMessage['answer06'] = 'Please enter an answer';
        } else if ($ansEntAddTwo2 == $answers06) {
            $addTwoCount++;
        } else {
            $wrong["32+29"] = $ansEntAddTwo2;
        }

        if ($ansEntAddTwo3 == "" || $ansEntAddTwo3 == NULL) {
            $errorMessage['answer07'] = 'Please enter an answer';
        } else if ($ansEntAddTwo3 == $answers07) {
            $addTwoCount++;
        } else {
            $wrong["74+41"] = $ansEntAddTwo3;
        }

        if ($ansEntAddTwo4 == "" || $ansEntAddTwo4 == NULL) {
            $errorMessage['answer08'] = 'Please enter an answer';
        } else if ($ansEntAddTwo4 == $answers08) {
            $addTwoCount++;
        } else {
            $wrong["95+58"] = $ansEntAddTwo4;
        }


        /* --------------------------------------------- */


        if ($ansEntAddThree1 == "" || $ansEntAddThree1 == NULL) {
            $errorMessage['answer09'] = 'Please enter an answer';
        } else if ($ansEntAddThree1 == $answers09) {
            $addThreeCount++;
        } else {
            $wrong["101+229"] = $ansEntAddThree1;
        }

        if ($ansEntAddThree2 == "" || $ansEntAddThree2 == NULL) {
            $errorMessage['answer10'] = 'Please enter an answer';
        } else if ($ansEntAddThree2 == $answers10) {
            $addThreeCount++;
        } else {
            $wrong["388+441"] = $ansEntAddThree2;
        }

        if ($ansEntAddThree3 == "" || $ansEntAddThree3 == NULL) {
            $errorMessage['answer11'] = 'Please enter an answer';
        } else if ($ansEntAddThree3 == $answers11) {
            $addThreeCount++;
        } else {
            $wrong["774+390"] = $ansEntAddThree3;
        }

        if ($ansEntAddThree4 == "" || $ansEntAddThree4 == NULL) {
            $errorMessage['answer12'] = 'Please enter an answer';
        } else if ($ansEntAddThree4 == $answers12) {
            $addThreeCount++;
        } else {
            $wrong["999+752"] = $ansEntAddThree4;
        }


        /* --------------------------------------------- */

        /* Sub */
        if ($ansEntSubOne1 == $answers13) {
            $subOneCount++;
        }

        if ($ansEntSubOne2 == $answers14) {
            $subOneCount++;
        }

        if ($ansEntSubOne3 == $answers15) {
            $subOneCount++;
        }

        if ($ansEntSubOne4 == $answers16) {
            $subOneCount++;
        }


        /* --------------------------------------------- */

        if ($ansEntSubTwo1 == $answers17) {
            $subTwoCount++;
        }

        if ($ansEntSubTwo2 == $answers18) {
            $subTwoCount++;
        }

        if ($ansEntSubTwo3 == $answers19) {
            $subTwoCount++;
        }

        if ($ansEntSubTwo4 == $answers20) {
            $subTwoCount++;
        }

        /* --------------------------------------------- */

        if ($ansEntSubThree1 == $answers21) {
            $subThreeCount++;
        }

        if ($ansEntSubThree2 == $answers22) {
            $subThreeCount++;
        }

        if ($ansEntSubThree3 == $answers23) {
            $subThreeCount++;
        }

        if ($ansEntSubThree4 == $answers24) {
            $subThreeCount++;
        }


        /* --------------------------------------------- */

        /* Mult */
        if ($ansMultOne1 == $answers25) {
            $multOneCount++;
        }

        if ($ansMultOne2 == $answers26) {
            $multOneCount++;
        }

        if ($ansMultOne3 == $answers27) {
            $multOneCount++;
        }

        if ($ansMultOne4 == $answers28) {
            $multOneCount++;
        }


        /* --------------------------------------------- */

        if ($ansMultTwo1 == $answers29) {
            $multTwoCount++;
        }

        if ($ansMultTwo2 == $answers30) {
            $multTwoCount++;
        }

        if ($ansMultTwo3 == $answers31) {
            $multTwoCount++;
        }

        if ($ansMultTwo4 == $answers32) {
            $multTwoCount++;
        }


        /* --------------------------------------------- */

        if ($ansMultThree1 == $answers33) {
            $multThreeCount++;
        }

        if ($ansMultThree2 == $answers34) {
            $multThreeCount++;
        }

        if ($ansMultThree3 == $answers35) {
            $multThreeCount++;
        }

        if ($ansMultThree4 == $answers36) {
            $multThreeCount++;
        }


        /* --------------------------------------------- */

        /* Div */
        if ($ansDivOne1 == $answers37) {
            $divOneCount++;
        }

        if ($ansDivOne2 == $answers38) {
            $divOneCount++;
        }

        if ($ansDivOne3 == $answers39) {
            $divOneCount++;
        }

        if ($ansDivOne4 == $answers40) {
            $divOneCount++;
        }

        /* --------------------------------------------- */

        if ($ansDivTwo1 == $answers41) {
            $divTwoCount++;
        }

        if ($ansDivTwo2 == $answers42) {
            $divTwoCount++;
        }

        if ($ansDivTwo3 == $answers43) {
            $divTwoCount++;
        }

        if ($ansDivTwo4 == $answers44) {
            $divTwoCount++;
        }

        /* --------------------------------------------- */

        if ($ansDivThree1 == $answers45) {
            $divThreeCount++;
        }

        if ($ansDivThree2 == $answers46) {
            $divThreeCount++;
        }

        if ($ansDivThree3 == $answers47) {
            $divThreeCount++;
        }

        if ($ansDivThree4 == $answers48) {
            $divThreeCount++;
        }



        if ($addThreeCount >= 3 || $addTwoCount >= 3) {
            $addLevel = 3;
        } else if ($addOneCount >= 3) {
            $addLevel = 2;
        } else {
            $addLevel = 1;
        }

        if ($subThreeCount >= 3 || $subTwoCount >= 3) {
            $subLevel = 3;
        } else if ($subOneCount >= 3) {
            $subLevel = 2;
        } else {
            $subLevel = 1;
        }


        if ($multThreeCount >= 3 || $multTwoCount >= 3) {
            $multLevel = 3;
        } else if ($multOneCount >= 3) {
            $multLevel = 2;
        } else {
            $multLevel = 1;
        }

        if ($divThreeCount >= 3 || $divTwoCount >= 3) {
            $divLevel = 3;
        } else if ($divOneCount >= 3) {
            $divLevel = 2;
        } else {
            $divLevel = 1;
        }


        student_db::update_student($student->getStudentID(), $student->getFName(), $student->getLName(), $addLevel, $subLevel, $multLevel, $divLevel, $student->getTeacherID());

        include('view/results.php');
        die();
        break;
    case 'results';
        $student = student_db::get_student_by_id($_SESSION['loggedInUser']->getStudentID());

        include('view/results.php');
        die();
        break;
    case 'logout':
        session_destroy();
        header("Refresh:0");
        include("view/home.php");
        die();
        break;
    case 'changePass':
        include('view/changePass.php');
        die();
        break;
    case 'actualPassChange':
        include('view/passwordChanged.php');
        die();
        break;
    case 'newUser':
        include('view/newUser.php');
        die();
        break;
    case 'createUser':
        include('view/userCreated.php');
        die();
        break;
}
?>
