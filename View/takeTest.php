<?php
$answerSheet = 'answerSheet00';



    if($type == 'addition'){
	for($i = 1; $i <= 10; $i++){
		$first = mt_rand($min, $max);
		$second = mt_rand($min, $max);
		$questions[$first."+".$second] = $first+$second;
                ++$answerSheet;
                $q = $questions[$first."+".$second];
                    if(array_key_exists($q, $questions)){
		$i--;}
        }
        } else if($type == 'subtraction'){

	for($i = 1; $i <= 10; $i++){
		$first = mt_rand($min, $max);
		$second = mt_rand($min, $max);
		if($first > $second){
			$questions[$first."-".$second] = $first-$second;
                        ++$answerSheet;
                        $q = $questions[$first."-".$second];
			if(array_key_exists($q, $questions)){
			$i--;}
		} else {
			$questions[$second."-".$first] = $second-$first;
                        ++$answerSheet;
                        $q = $questions[$second."-".$first];
			if(array_key_exists($q, $questions)){
			$i--;}
		}
        }
    }else if($type == 'multiplication'){
	
	for($i = 1; $i < 10; $i++){
		$first = mt_rand($min, $max);
		$second = mt_rand($min, $max);
		$questions[$first."*".$second] = $first*$second;
                ++$answerSheet;
                $q = $questions[$first."*".$second];
		if(array_key_exists($q, $questions)){
		$i--;}
        }
    } else {

	for($i = 1; $i < 10; $i++){
		$first = mt_rand($min, $max);
		$second = mt_rand($min, $max);
                if(is_int($first/$second) && ($first/$second != 0)){
                    $questions[$first."/".$second] = $first/$second;
                    $q = $questions[$first."/".$second];
                    ++$answerSheet;
                    if(array_key_exists($q, $questions)){
                    $i--;}
                } else if(is_int($second/$first) && ($second/$first != 0)) {
                    $questions[$second."/".$first] = $second/$first;
                    $q = $questions[$second."/".$first];
                    ++$answerSheet;
                    if(array_key_exists($q, $questions)){
                    $i--;}
                }else{
                    $i--;
                }
               
    }}
        ?>


<?php include '/xampp/htdocs/mathwiz/view/header.php'; ?>


<div id="wrapper">

    <?php include '/xampp/htdocs/mathwiz/view/headerElement.php'; ?>
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