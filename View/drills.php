<?php 
    
    $answerSheet = [];
    $q = [];
    $test = 'right';
    $nope = 'nope';


    if($type == 'addition'){
	for($i = 1; $i <= 10; $i++){
		$first = mt_rand($min, $max);
		$second = mt_rand($min, $max);
		$questions[$first."+".$second] = $first+$second;
                $q = $questions[$first."+".$second];
                    if(array_key_exists($q, $questions)){
		$i--;
                }else{
                    $answerSheet[$i]= $questions;
                }
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
               
        }
}
        $_SESSION['answerSheet'] = $answerSheet;
        $_SESSION['questions'] = $questions;
        var_dump($type);
        var_dump($min);
        var_dump($max);

        
        $a = 'answer00';
        $b = 'b00';
        
        ?>
<?php include '/xampp/htdocs/mathwiz/view/header.php'; ?>


<div id="wrapper">

    <?php include '/xampp/htdocs/mathwiz/view/headerElement.php'; ?>
    <?php include '/xampp/htdocs/mathwiz/view/nav.php'; ?>
    
     <div class="content">
        <h2>Level Test</h2>
        <p><?php echo $student->getFName(); ?>, you ready to drill? Take your time and read each question carefully.</p>


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
                        <td><form action="index.php" method="post">
                                <input type="hidden" name="action"  value="random_display_profile">
                                       <input type="hidden" name="<?php echo ++$b; ?>" value="<?php echo $value ?>"></td>
                        <td><form action="index.php" method="post">
                            <input type="text" name="<?php echo ++$a; ?>">
                            </form></td>
                    </tr>
                    <p><?php echo $answerSheet[$value]; ?> </p>
                <?php endforeach; ?>

            </table>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="drillResults">
                <input type="submit" value="Submit Answers">
            </form>

        </div>

 <?php include '/xampp/htdocs/mathwiz/view/footer.php'; ?>