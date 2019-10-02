<?php 
    $addOneQuestions = [
		"1+1" => 2,
		"3+2" => 5,
		"5+1" => 6,
		"7+2" => 9,
		];
	
	$addTwoQuestions = [
		"10+10" => 20,
		"32+29" => 61,
		"74+41" => 115,
		"95+58" => 153,
		];
		
	$addThreeQuestions = [
		"101+229" => 330,
		"388+441" => 829,
		"774+390" => 1164,
		"999+752" => 1751,
		];
		
	$subOneQuestions = [
		"3-1" => 2,
		"5-2" => 3,
		"7-1" => 6,
		"9-0" => 9,
		];
	
	$subTwoQuestions = [
		"28-12" => 16,
		"75-25" => 50,
		"99-14" => 85,
		"72-58" => 14,
		];
		
	$subThreeQuestions = [
		"333-102" => 231,
		"582-385" => 197,
		"745-215" => 530,
		"999-588" => 411,
		];
		
	$multOneQuestions = [
		"2x1" => 2,
		"3x3" => 9,
		"7x6" => 42,
		"9x8" => 72,
		];
	
	$multTwoQuestions = [
		"11x13" => 143,
		"32x42" => 1344,
		"55x18" => 990,
		"97x68" => 6596,
		];
		
	$multThreeQuestions = [
		"105x118" => 12390,
		"395x222" => 87690,
		"632x539" => 340648,
		"955x666" => 636030,
		];
		
	$divOneQuestions = [
		"2/1" => 2,
		"4/2" => 2,
		"9/3" => 3,
		"8/2" => 4,
		];
		
	$divTwoQuestions = [
		"44/11" => 4,
		"99/33" => 3,
		"84/21" => 4,
		"96/32" => 3,
		];
	
	$divThreeQuestions = [
		"496/8" => 62,
		"306/6" => 51,
		"279/9" => 31,
		"612/6" => 102,
		];
        
        $a = 'ansAddOne0';
        $b = 'ansAddTwo0';
        $c = 'ansAddThree0';
        $d = 'ansEntSubOne0';
        $e = 'ansEntSubTwo0';
        $f = 'ansEntSubThree0';
        $g = 'ansMultOne0';
        $h = 'ansMultTwo0';
        $i = 'ansMultThree0';
        $j = 'ansDivOne0';
        $k = 'ansDivTwo0';
        $l = 'ansDivThree0';
        
?>

<?php include '/xampp/htdocs/mathwiz/view/header.php'; ?>
    

        <div id="wrapper">

            <?php include '/xampp/htdocs/mathwiz/view/nav.php'; ?>

       <div class="content"> 
                 <h2>Baseline Test</h2>
        <p>&nbsp;&nbsp;&nbsp; You will have 48 questions to answer. They will go over addition, subtraction, multiplication and division. How you do on this test will set what types of drills and tests you will have in the future.</p>
        
        
        <table>
                    <tr>
                        <th>Addition Level 1</th>
                        <th>&nbsp;</th>
                        <th>Questions</th>
                        <th>&nbsp;</th>
                        <th>Answer</th>
                        
                    </tr>
                    <?php foreach ($addOneQuestions as $key => $value) : ?>
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
                        
                    <tr>
                        <th>Addition Level 2</th>
                        <th>&nbsp;</th>
                        <th>Questions</th>
                        <th>&nbsp;</th>
                        <th>Answer</th>
                        
                    </tr>
                    <?php foreach ($addTwoQuestions as $key => $value) : ?>
                        <tr>
                        
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?php echo $key; ?></td>
                        <td>&nbsp;</td>
                        <td><form action="index.php" method="post">
                            <input type="text" name="<?php echo ++$b; ?>">
                            </form></td>
                        </tr>
                    <?php endforeach; ?> 
                    
                    <tr>
                        <th>Addition Level 3</th>
                        <th>&nbsp;</th>
                        <th>Questions</th>
                        <th>&nbsp;</th>
                        <th>Answer</th>
                        
                    </tr>
                    <?php foreach ($addThreeQuestions as $key => $value) : ?>
                        <tr>
                        
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?php echo $key; ?></td>
                        <td>&nbsp;</td>
                        <td><form action="index.php" method="post">
                            <input type="text" name="<?php echo ++$c; ?>">
                            </form></td>
                        </tr>
                    <?php endforeach; ?> 
        
                    <tr>
                        <th>Subtraction Level 1</th>
                        <th>&nbsp;</th>
                        <th>Questions</th>
                        <th>&nbsp;</th>
                        <th>Answer</th>
                        
                    </tr>
                    <?php foreach ($subOneQuestions as $key => $value) : ?>
                        <tr>
                        
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?php echo $key; ?></td>
                        <td>&nbsp;</td>
                        <td><form action="index.php" method="post">
                            <input type="text" name="<?php echo ++$d; ?>">
                            </form></td>
                        </tr>
                    <?php endforeach; ?>
                        
                    <tr>
                        <th>Subtraction Level 2</th>
                        <th>&nbsp;</th>
                        <th>Questions</th>
                        <th>&nbsp;</th>
                        <th>Answer</th>
                        
                    </tr>
                    <?php foreach ($subTwoQuestions as $key => $value) : ?>
                        <tr>
                        
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?php echo $key; ?></td>
                        <td>&nbsp;</td>
                        <td><form action="index.php" method="post">
                            <input type="text" name="<?php echo ++$e; ?>">
                            </form></td>
                        </tr>
                    <?php endforeach; ?>
                        
                    <tr>
                        <th>Subtraction Level 3</th>
                        <th>&nbsp;</th>
                        <th>Questions</th>
                        <th>&nbsp;</th>
                        <th>Answer</th>
                        
                    </tr>
                    <?php foreach ($subThreeQuestions as $key => $value) : ?>
                        <tr>
                        
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?php echo $key; ?></td>
                        <td>&nbsp;</td>
                        <td><form action="index.php" method="post">
                            <input type="text" name="<?php echo ++$f; ?>">
                            </form></td>
                        </tr>
                    <?php endforeach; ?>
                        
                    <tr>
                        <th>Multiplication Level 1</th>
                        <th>&nbsp;</th>
                        <th>Questions</th>
                        <th>&nbsp;</th>
                        <th>Answer</th>
                        
                    </tr>
                    <?php foreach ($multOneQuestions as $key => $value) : ?>
                        <tr>
                        
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?php echo $key; ?></td>
                        <td>&nbsp;</td>
                        <td><form action="index.php" method="post">
                            <input type="text" name="<?php echo ++$g; ?>">
                            </form></td>
                        </tr>
                    <?php endforeach; ?>
                        
                    <tr>
                        <th>Multiplication Level 2</th>
                        <th>&nbsp;</th>
                        <th>Questions</th>
                        <th>&nbsp;</th>
                        <th>Answer</th>
                        
                    </tr>
                    <?php foreach ($multTwoQuestions as $key => $value) : ?>
                        <tr>
                        
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?php echo $key; ?></td>
                        <td>&nbsp;</td>
                        <td><form action="index.php" method="post">
                            <input type="text" name="<?php echo ++$h; ?>">
                            </form></td>
                        </tr>
                    <?php endforeach; ?>
                        
                    <tr>
                        <th>Multiplication Level 3</th>
                        <th>&nbsp;</th>
                        <th>Questions</th>
                        <th>&nbsp;</th>
                        <th>Answer</th>
                        
                    </tr>
                    <?php foreach ($multThreeQuestions as $key => $value) : ?>
                        <tr>
                        
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?php echo $key; ?></td>
                        <td>&nbsp;</td>
                        <td><form action="index.php" method="post">
                            <input type="text" name="<?php echo ++$i; ?>">
                            </form></td>
                        </tr>
                    <?php endforeach; ?>
                        
                    <tr>
                        <th>Division Level 1</th>
                        <th>&nbsp;</th>
                        <th>Questions</th>
                        <th>&nbsp;</th>
                        <th>Answer</th>
                        
                    </tr>
                    <?php foreach ($divOneQuestions as $key => $value) : ?>
                        <tr>
                        
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?php echo $key; ?></td>
                        <td>&nbsp;</td>
                        <td><form action="index.php" method="post">
                            <input type="text" name="<?php echo ++$j; ?>">
                            </form></td>
                        </tr>
                    <?php endforeach; ?>
                        
                    <tr>
                        <th>Division Level 2</th>
                        <th>&nbsp;</th>
                        <th>Questions</th>
                        <th>&nbsp;</th>
                        <th>Answer</th>
                        
                    </tr>
                    <?php foreach ($divTwoQuestions as $key => $value) : ?>
                        <tr>
                        
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?php echo $key; ?></td>
                        <td>&nbsp;</td>
                        <td><form action="index.php" method="post">
                            <input type="text" name="<?php echo ++$k; ?>">
                            </form></td>
                        </tr>
                    <?php endforeach; ?>
                        
                    <tr>
                        <th>Division Level 3</th>
                        <th>&nbsp;</th>
                        <th>Questions</th>
                        <th>&nbsp;</th>
                        <th>Answer</th>
                        
                    </tr>
                    <?php foreach ($divThreeQuestions as $key => $value) : ?>
                        <tr>
                        
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?php echo $key; ?></td>
                        <td>&nbsp;</td>
                        <td><form action="index.php" method="post">
                            <input type="text" name="<?php echo ++$l; ?>">
                            </form></td>
                        </tr>
                    <?php endforeach; ?>
                        
                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="commitResults">
                        <input type="submit" value="Submit Answers">
                    </form>
        </div>
  
        
<?php include '/xampp/htdocs/mathwiz/view/footer.php'; ?>
