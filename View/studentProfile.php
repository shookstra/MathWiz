<?php include '\xampp\htdocs\MathWiz\View\header.php'; ?>

<body>
    <div id="wrapper">
        <?php
        // put your code here
        ?>
        <div id="heading"> 
            <h1>Math Drills Site</h1>
        </div>

        <?php include '\xampp\htdocs\MathWiz\View/nav.php'; ?>
        <br>
        <h2>Profile</h2>
        <div class="content">
            <p><?php echo $_SESSION['loggedInUser'] ?></p>
            <p>&nbsp;&nbsp;&nbsp; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. 
                Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla.
            </p>


        </div>








    </div>


    <?php include '\xampp\htdocs\MathWiz\View/footer.php'; ?>