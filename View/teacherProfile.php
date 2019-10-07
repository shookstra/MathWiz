<?php include '/xampp/htdocs/mathwiz/view/header.php'; ?>


<body>
    <div id="wrapper">
        <div id="heading">
            <h1>Math Drills Site</h1>
        </div>
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
                <?php foreach ($students as $single) : ?>
                    <tr>
                        <td><?php echo $single->getFName(); ?></td>
                        <td><?php echo $single->getLName(); ?></td>
                        <td><?php echo $single->getStudentID(); ?></td>
                        <td><?php echo $single->getAdditionLevel(); ?></td>
                        <td><?php echo $single->getSubtractionLevel(); ?></td>
                        <td><?php echo $single->getMultiplicationLevel(); ?></td>
                        <td><?php echo $single->getDivisionLevel(); ?></td>
                        <td><form action="index.php" method="post">
                                <input type="hidden" name="action"
                                       value="view_invoice">
                                <input type="hidden" name="invoiceNum"
                                       value="<?php echo $single->getStudentID(); ?>">
                                <input type="submit" value="View Student">
                            </form></td>
                    </tr>
                <?php endforeach; ?>
            </table><br>
        </div>

        <?php include '/xampp/htdocs/mathwiz/view/footer.php'; ?>
