<?php include '/xampp/htdocs/mathwiz/view/header.php'; ?>

<body>
    <div id="wrapper">

        <?php include '/xampp/htdocs/mathwiz/view/headerElement.php'; ?>
        <?php include '/xampp/htdocs/mathwiz/view/nav.php'; ?>

        <div class="content">
            <h2>Master Tests</h2>
            <p>This is for you, <?php echo $_SESSION['loggedInUser']->getFName(); ?>, to show you've learned the material and are ready to move on to the next level. Select which Math type you want to do and then show them what you got!</p>

            <p><?php echo $_SESSION['loggedInUser']->getFName(); ?>, choose which Math type you would like to take your test on</p>

            <form action="index.php" method="POST">
                <input type="hidden" name="action" value="takeTest">
                <select name='type'>
                    <option value="addition" selected>Addition</option>
                    <option value="subtraction">Subtraction</option>
                    <option value="multiplication">Multiplication</option>
                    <option value="division">Division</option>
                </select><br>
                <input type="hidden" value="takeTest" name="action">
                <input type="submit" value="Begin Test">
            </form>


        </div>


        <?php include '/xampp/htdocs/mathwiz/view/footer.php'; ?>