<?php include '/xampp/htdocs/mathwiz/view/header.php'; ?>


    <body>
        <main>

                <h2>Congratulations, <?php echo $userID->getFName(); ?></h2>
                
                <?php include '/xampp/htdocs/mathwiz/view/nav.php'; ?>
                
                <table>
                    <tr>
                        <th>Student First Name</th>
                        <th>Student Last Name</th>
                        <th>Student ID Number</th>
                        <th>Addition Level</th>
                        <th>Subtraction Level</th>
                        <th>Multiplication Level</th>
                        <th>Division Level</th>
                    </tr>
                    <?php foreach ($student as $single) : ?>
                        <tr>

                        <td><?php echo $single->getFName(); ?></td>
                        <td><?php echo $single->getLName(); ?></td>
                        <td><?php echo $single->getStudentID(); ?></td>
                        <td><?php echo $single->getAdditionLevel(); ?></td>
                        <td><?php echo $single->getSubtractionLevel(); ?></td>
                        <td><?php echo $single->getMultiplicationLevel(); ?></td>
                        <td><?php echo $single->getDivisionLevel(); ?></td>
                        <td><form action="index.php" method="post">
                                <input type="hidden" name="action"
                                       value="view_invoice">
                                <input type="hidden" name="invoiceNum"
                                       value="<?php echo $single->getStudentID(); ?>">
                                <input type="submit" value="View Student">
                            </form></td>
                        </tr>
                    <?php endforeach; ?> 

                </table><br>
                
                
                

        </main>
  
        
        
<?php include '/xampp/htdocs/mathwiz/view/footer.php'; ?>

