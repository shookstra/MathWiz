<?php include 'view/header.php'; ?>

<div id="wrapper">
       
       <div id="heading"> 
           <h1>Math Drill Site</h1>
       </div>
             <?php include 'view/nav.php'; ?>
    
    <h2>Login</h2>
    <p>Please login. If are having difficulty please contact your teacher. To reset password, please contact admin.</p>
    <div  id="login">
        
                <form action="index.php" method="POST">
                <input type="hidden" name="action" value="loggedin">
                <label>User Name: </label><input class="entry" type="text" name="username"><br><br>
                <label>Password: </label><input class="entry" type="text" name="password"><br><br>
                <form action="index.php" method="POST">
                    <input type="hidden" value="viewStudent" name="action">
                <input type="submit" value="Login">
            </form>
                
                
                <br>
   
     
     </div>
<?php include 'view/footer.php'; ?>