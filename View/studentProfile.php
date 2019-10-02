<?php include '/xampp/htdocs/mathwiz/view/header.php'; ?>



<body>
    <div id="wrapper">
        <div id="heading">
            <h1>Math Drills Site</h1>
        </div>
        <?php include '/xampp/htdocs/mathwiz/view/nav.php'; ?>
        <h2>Profile</h2>
        <div class="content">
            <p>StudentID: <?php echo $_SESSION['loggedInUser']->getStudentID() ?></p>
            <p>Password: <?php echo $_SESSION['loggedInUser']->getPassword() ?></p>
            <p>First Name: <?php echo $_SESSION['loggedInUser']->getFName() ?></p>
            <p>Last Name: <?php echo $_SESSION['loggedInUser']->getLName() ?></p>
            <p>Addition Level: <?php echo $_SESSION['loggedInUser']->getAdditionLevel() ?></p>
            <p>Subtraction Level: <?php echo $_SESSION['loggedInUser']->getSubtractionLevel() ?></p>
            <p>Multiplication Level: <?php echo $_SESSION['loggedInUser']->getMultiplicationLevel() ?></p>
            <p>Division Level: <?php echo $_SESSION['loggedInUser']->getDivisionLevel() ?></p>
            <p>Teacher ID: <?php echo $_SESSION['loggedInUser']->getTeacherID() ?></p>
        </div>

        <?php include '/xampp/htdocs/mathwiz/view/footer.php'; ?>
    </div>
</body>
