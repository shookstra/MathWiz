<?php include '/xampp/htdocs/mathwiz/view/header.php'; ?>


    <body>
       
            <div id="wrapper">
                <h2>Congratulations, <?php echo $student->getFName(); ?></h2>
                
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

                        <td><?php echo $student->getFName(); ?></td>
                        <td><?php echo $student->getLName(); ?></td>
                        <td><?php echo $student->getStudentID(); ?></td>
                        <td><?php echo $student->getAdditionLevel(); ?></td>
                        <td><?php echo $student->getSubtractionLevel(); ?></td>
                        <td><?php echo $student->getMultiplicationLevel(); ?></td>
                        <td><?php echo $student->getDivisionLevel(); ?></td>
                        </tr>


                </table><br>
                
            </div>  
                

        
        
<?php include '/xampp/htdocs/mathwiz/view/footer.php'; ?>

