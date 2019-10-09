<?php include '/xampp/htdocs/mathwiz/view/header.php'; ?>

<body>
    <div id="wrapper">
        <?php include '/xampp/htdocs/mathwiz/view/headerElement.php'; ?>
        <?php include '/xampp/htdocs/mathwiz/view/nav.php'; ?>

        <div class="content">
            <h2>Profile</h2>
            <p>StudentID: <?php echo $student->getStudentID() ?></p>
            <p>Password: <?php echo $student->getPassword() ?></p>
            <p>First Name: <?php echo $student->getFName() ?></p>
            <p>Last Name: <?php echo $student->getLName() ?></p>
            <p>Addition Level: <?php echo $student->getAdditionLevel() ?></p>
            <p>Subtraction Level: <?php echo $student->getSubtractionLevel() ?></p>
            <p>Multiplication Level: <?php echo $student->getMultiplicationLevel() ?></p>
            <p>Division Level: <?php echo $student->getDivisionLevel() ?></p>
            <p>Teacher ID: <?php echo $student->getTeacherID() ?></p>
        </div>

        <?php include '/xampp/htdocs/mathwiz/view/footer.php'; ?>
    </div>
</body>
