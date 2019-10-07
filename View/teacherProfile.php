<?php include '/xampp/htdocs/mathwiz/view/header.php'; ?>


<body>
    <div id="wrapper">
        <?php include '/xampp/htdocs/mathwiz/view/headerElement.php'; ?>
        <?php include '/xampp/htdocs/mathwiz/view/nav.php'; ?>
        <br>
        <h2>Welcome, <?php echo $_SESSION['loggedInUser']->getFName() . " " . $_SESSION['loggedInUser']->getLName(); ?></h2>

        <div class="content">
            <p>Teacher ID: <?php echo $_SESSION['loggedInUser']->getTeacherID(); ?></p>
            <p>Password: <?php echo $_SESSION['loggedInUser']->getPassword(); ?></p>

            <table>
                <tr>
                    <th>Student First Name</th>
                    <th>Student Last Name</th>
                    <th>Student ID Number</th>
                    <th>Addition Level</th>
                    <th>Subtraction Level</th>
                    <th>Multiplication Level</th>
                    <th>Division Level</th>
                </tr>
            </table><br>
        </div>

        <?php include '/xampp/htdocs/mathwiz/view/footer.php'; ?>
