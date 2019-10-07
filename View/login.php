<?php include 'view/header.php'; ?>

<div id="wrapper">
    <?php include 'view/headerElement.php'; ?>
    <?php include 'view/nav.php'; ?>


    <div class="content">
        <h2>Login</h2>
        <p>Please login. If you are having difficulty please contact your teacher. To reset password, please contact admin.</p>

        <div id="login">
            <form action="index.php" method="POST">
                <input type="hidden" name="action" value="loggedin">
                <select name='userType'>
                    <option value="student" selected>Student</option>
                    <option value="teacher">Teacher</option>
                    <option value="admin">Administrator</option>
                </select><br>
                <label>User ID: </label><input class="entry" type="text" name="userID"><br><br>
                <label>Password: </label><input class="entry" type="password" name="password"><br><br>
                <form action="index.php" method="POST">
                    <input type="hidden" value="loggedin" name="action">
                    <input type="submit" value="Login">
                </form>
                <p><?php echo $errors; ?></p>
        </div>

    </div>
    <?php include 'view/footer.php'; ?>