<?php include '/xampp/htdocs/mathwiz/view/header.php'; ?>

    <body>
        <div id="wrapper">

             
            <?php include '/xampp/htdocs/mathwiz/view/nav.php'; ?>
           
            <div class="content"> 
                 <h2><?php echo $_SESSION['loggedInUser']->getFName(); ?>, you ready to Drill?</h2>
        <p><?php echo $_SESSION['loggedInUser']->getFName(); ?>, choose what type of Math you would like to drill on.</p>
		
		<form action="index.php" method="POST">
            <input type="hidden" name="action" value="doDrills">
            <select name='type'>
                <option value="addition" selected>Addition</option>
                <option value="subtraction">Subtraction</option>
                <option value="multiplication">Multiplication</option>
				<option value="division">Division</option>
            </select><br>
			<input type="hidden" value="doDrills" name="action">
            <input type="submit" value="Begin Drills">
        </form>
        
        
        
        </div>
        
        
<?php include '/xampp/htdocs/mathwiz/view/footer.php'; ?>