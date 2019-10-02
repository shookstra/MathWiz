<?php include '/xampp/htdocs/mathwiz/view/header.php'; ?>

<div id="wrapper">

    <div id="heading"> 
        <h1>Math Drill Site</h1>
    </div>
    <?php include '/xampp/htdocs/mathwiz/view/nav.php'; ?>
    <br>
    <h2>Change Password</h2>
    <p>Select User type, enter user ID and new password.</p>
    <div  id="login">

        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="loggedin">
            <select name='userType'>
                <option value="student" selected>Student</option>
                <option value="teacher">Teacher</option>
                <option value="admin">Administrator</option>
            </select><br>
            <label>User ID: </label><input class="entry" type="text" name="userID"><br><br>
            <label>New Password: </label><input class="entry" type="text" name="password"><br><br>
            <form action="index.php" method="POST">
                <input type="hidden" value="actualPassChange" name="action">
                <input type="submit" value="Update Password">
            </form>
            <p><?php echo $errors ; ?></p>


            <br>


            </div>
            <?php include 'view/footer.php'; ?>
