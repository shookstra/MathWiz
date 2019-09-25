<?php include 'view/header.php'; ?>

<div id="wrapper">
        <?php
        // put your code here
        ?>
       <div id="heading"> 
           <h1>Math Drill Site</h1>
       </div>
             <?php include 'view/nav.php'; ?>
    <h2>Login</h2>
                <form action="index.php" method="POST">
                <input type="hidden" name="action" value="loggedin">
                <label>User Name: </label><input class="entry" type="text" name="username"><br>
                <label>Password: </label><input class="entry" type="text" name="password"><br>
                <form action="index.php" method="POST">
                <input type="submit" value="Login">
            </form>
                <br><!--
   <table style="width: 400px;">
         <tr>
        <td style="width: 5%;">
              
                <input type="hidden" name="action" value="loggedin">
                <label>User Name: </label> <input type="text" name="username">
            
         </td> 
	 <td style="width: 5%;">
            
             <label>error goes here</label>
               
            </td>
         </tr>
         <tr>
              <td style="width: 5%;">
           <form action="index.php" method="POST">
              <input type="hidden" name="action" value="loggedin">
               <label>Password: </label> <input type="text" name="password">
            
               
            </td>
            <td style="width: 5%;">
            <label>error goes here</label>
            
            </td>
          </tr>
        </table>
     
     -->
     
     </div>
<?php include 'view/footer.php'; ?>