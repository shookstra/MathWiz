<?php include 'view/header.php'; ?>

<div id="wrapper">

    <div id="heading"> 
        <h1>Math Drill Site</h1>
    </div>
    <?php include 'view/nav.php'; ?>

    <h2>Create User</h2>
    <p>Create user account</p>
    <div  id="login">

        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="createUser">
            <select name='userType'>
                <option value="student" selected>Student</option>
                <option value="teacher">Teacher</option>
                <option value="admin">Administrator</option>
            </select><br>
            <label>User ID: </label><input class="entry" type="text" name="userID"><br><br>
            <label>Password: </label><input class="entry" type="password" name="password"><br><br>
            <form action="index.php" method="POST">
                <input type="hidden" value="createUser" name="action">
                <input type="submit" value="Create User">
            </form>
            <p><?php echo $errors ; ?></p>


            </div>
            <?php include 'view/footer.php'; ?>
