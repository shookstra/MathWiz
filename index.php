<?php



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