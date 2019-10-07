<?php include '/xampp/htdocs/mathwiz/view/header.php'; ?>


<body>
    <div id="wrapper">
        <?php include '/xampp/htdocs/mathwiz/view/headerElement.php'; ?>
        <?php include '/xampp/htdocs/mathwiz/view/nav.php'; ?>
        <br>
        <h2>Welcome, <?php echo $_SESSION['loggedInUser']->getFName() . " " . $_SESSION['loggedInUser']->getLName(); ?></h2>

        <div class="content">

            <p>Admin ID: <?php echo $_SESSION['loggedInUser']->getAdminID(); ?></p>
            <p>Password: <?php echo $_SESSION['loggedInUser']->getPassword(); ?></p>

            <table>
                <tr>
                    <th>Teacher First Name</th>
                    <th>Teacher Last Name</th>
                    <th>Teacher ID Number</th>
                    <th>Students Addition Level Average</th>
                    <th>Students Subtraction Level Average</th>
                    <th>Students Multiplication Level Average</th>
                    <th>Students Division Level Average</th>
                </tr>

            </table><br>
            <form action="index.php" method="POST">
                <input type="hidden" value="changePass" name="action">
                <input type="submit" value="Change Password">
            </form>
            <form action="index.php" method="POST">
                <input type="hidden" value="newUser" name="action">
                <input type="submit" value="New User">
            </form>
        </div>



        <?php include '/xampp/htdocs/mathwiz/view/footer.php'; ?>
