<?php include '/xampp/htdocs/mathwiz/view/header.php'; ?>
    

        <div id="wrapper">

            <?php include '/xampp/htdocs/mathwiz/view/nav.php'; ?>

       <div class="content"> 
                 <h2>Level Test</h2>
        <p><?php echo $_SESSION['loggedInUser']->getFName(); ?>, take your time and read the questions carefully. Dont rush through the drill, and make sure to answer each question. This will be cake for you!</p>
        
        
        <table>
                    <tr>
                        <th>Level Test</th>
                        <th>&nbsp;</th>
                        <th>Questions</th>
                        <th>&nbsp;</th>
                        <th>Answer</th>
                        
                    </tr>
                    <?php foreach ($questions as $key => $value) : ?>
                        <tr>
                        
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?php echo $key; ?></td>
                        <td>&nbsp;</td>
                        <td><form action="index.php" method="post">
                            <input type="text" name="<?php echo ++$a; ?>">
                            </form></td>
                        </tr>
                    <?php endforeach; ?> 
					
					
		
        </table>
					<form action="index.php" method="post">
                        <input type="hidden" name="action" value="testResults">
                        <input type="submit" value="Submit Answers">
                    </form>
		
        </div>
  
        
<?php include '/xampp/htdocs/mathwiz/view/footer.php'; ?>