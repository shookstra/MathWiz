<?php include '/xampp/htdocs/mathwiz/view/header.php'; ?>


    <body>
        <p><?php if($ansEntAddOne1 === $addOneQuestions["1+1"]){?> <p>hi</p> <?php }else{ ?> <p>nope</p> <?php } ?></p>
            <div id="wrapper">
                <h2>Congratulations, <?php echo $_SESSION['loggedInUser']->getFName(); ?></h2>
                
                <?php include '/xampp/htdocs/mathwiz/view/nav.php'; ?>
                
                <p>Here is where you fall now</p><br>
                <table>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>ID Number</th>
                        <th>Add Level</th>
                        <th>Sub Level</th>
                        <th>Mult Level</th>
                        <th>Div Level</th>
                    </tr>
                    
                        <tr>

                        <td><?php echo $_SESSION['loggedInUser']->getFName(); ?></td>
                        <td><?php echo $_SESSION['loggedInUser']->getLName(); ?></td>
                        <td><?php echo $_SESSION['loggedInUser']->getStudentID(); ?></td>
                        <td><?php echo $_SESSION['loggedInUser']->getAdditionLevel(); ?></td>
                        <td><?php echo $_SESSION['loggedInUser']->getSubtractionLevel(); ?></td>
                        <td><?php echo $_SESSION['loggedInUser']->getMultiplicationLevel(); ?></td>
                        <td><?php echo $_SESSION['loggedInUser']->getDivisionLevel(); ?></td>
                        </tr>


                </table><br>
                
            </div>  
                

        
        
<?php include '/xampp/htdocs/mathwiz/view/footer.php'; ?>

