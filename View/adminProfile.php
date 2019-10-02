<?php include '/xampp/htdocs/mathwiz/view/header.php'; ?>


    <body>
        <div id="wrapper">
            
            <div id="heading"> 
           <h1>Math Drills Site</h1>
            </div>
             <?php include '/xampp/htdocs/mathwiz/view/nav.php'; ?>
            <br>
                <h2>Welcome, <?php echo $admin->getFName(); ?></h2>
                
               
                <div class="content">
                <table>
                    <tr>
                        <th>Teacher First Name</th>
                        <th>Teacher Last Name</th>
                        <th>Teacher ID Number</th>
                        <th>Students Addition Level Average</th>
                        <th>Students Subtraction Level Average</th>
                        <th>Students Multiplication Level Average</th>
                        <th>Students Division Level Average</th>
                    </tr>
                    <?php foreach ($admins as $single) : ?>
                        <tr>

                        <td><?php echo $single->getFName(); ?></td>
                        <td><?php echo $single->getLName(); ?></td>
                        <td><?php echo $single->getTeacherID(); ?></td>
                        <td><?php echo $single->getAdditionLevelAvg(); ?></td>
                        <td><?php echo $single->getSubtractionLevelAvg(); ?></td>
                        <td><?php echo $single->getMultiplicationLevelAvg(); ?></td>
                        <td><?php echo $single->getDivisionLevelAvg(); ?></td>
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
                <form action="index.php" method="POST">
                <input type="hidden" value="changePass" name="action">
                <input type="submit" value="Change Password">
            </form>

                </div>
  
        
        
<?php include '/xampp/htdocs/mathwiz/view/footer.php'; ?>
