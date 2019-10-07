<?php
switch ($type) {
    case 'addition';

        for ($i = 0; $i < 10; $i++) {
            $first = mt_rand($min, $max);
            $second = mt_rand($min, $max);
            $questions[$first . "+" . $second] = $first + $second;
            $q = $questions[$first . "+" . $second];
            if (array_key_exists($q, $questions)) {
                $i--;
            }
        }
        die();
        break;

    case 'subtraction';

        for ($i = 0; $i < 10; $i++) {
            $first = mt_rand($min, $max);
            $second = mt_rand($min, $max);
            if ($first > $second) {
                $questions[$first . "-" . $second] = $first - $second;
                $q = $questions[$first . "-" . $second];
                if (array_key_exists($q, $questions)) {
                    $i--;
                }
            } else {
                $questions[$second . "-" . $first] = $second - $first;
                $q = $questions[$first . "-" . $second];
                if (array_key_exists($q, $questions)) {
                    $i--;
                }
            }
        }
        die();
        break;

    case 'multiplication':

        for ($i = 0; $i < 10; $i++) {
            $first = mt_rand($min, $max);
            $second = mt_rand($min, $max);
            $questions[$first . "*" . $second] = $first * $second;
            $q = $questions[$first . "*" . $second];
            if (array_key_exists($q, $questions)) {
                $i--;
            }
        }
        die();
        break;

    case 'division':

        for ($i = 0; $i < 10; $i++) {
            $first = mt_rand($min, $max);
            $second = mt_rand($min, $max);
            $questions[$first . "/" . $second] = $first / $second;
            $q = $questions[$first . "/" . $second];
            if (array_key_exists($q, $questions)) {
                $i--;
            }
        }

        die();
        break;
}


$a = 'answer00';
?>

<?php include '/xampp/htdocs/mathwiz/view/header.php'; ?>

<body>
    <div id="wrapper">
        <?php include '/xampp/htdocs/mathwiz/view/headerElement.php'; ?>
        <?php include '/xampp/htdocs/mathwiz/view/nav.php'; ?>

        <div class="content">
            <h2>Drills</h2>
            <p><?php echo $student->getFName(); ?>, take your time and read the questions carefully. Dont rush through the drill, and make sure to answer each question.</p>


            <table>
                <tr>
                    <th>Practice Drills</th>
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
                <input type="hidden" name="action" value="drillsResults">
                <input type="submit" value="Submit Answers">
            </form>

        </div>
</body>

<?php include '/xampp/htdocs/mathwiz/view/footer.php'; ?>