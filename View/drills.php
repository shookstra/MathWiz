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

	for($i = 0; $i < 10; $i++){
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
	
	for($i = 0; $i < 10; $i++){
		$first = mt_rand($min, $max);
		$second = mt_rand($min, $max);
		$questions[$first."*".$second] = $first*$second;
                ++$answerSheet;
                $q = $questions[$first."*".$second];
		if(array_key_exists($q, $questions)){
		$i--;}
        }
    } else {

	for($i = 0; $i < 10; $i++){
		$first = mt_rand($min, $max);
		$second = mt_rand($min, $max);
		$questions[$first."/".$second] = $first/$second;
                ++$answerSheet;
                $q = $questions[$first."/".$second];
		if(array_key_exists($q, $questions)){
		$i--;}
        }
}
        var_dump($type);
        var_dump($min);
        var_dump($max);
   
        $a = 'answer00';
        
        ?>

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
                <input type="hidden" name="action" value="drillsResults">
                <input type="submit" value="Submit Answers">
            </form>

        </div>
</body>

<?php include '/xampp/htdocs/mathwiz/view/footer.php'; ?>
