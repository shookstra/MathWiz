<?php
$a = 'answer00';
?>

<?php include '/xampp/htdocs/mathwiz/view/header.php'; ?>


<div id="wrapper">
    <?php include '/xampp/htdocs/mathwiz/view/headerElement.php'; ?>
    <?php include '/xampp/htdocs/mathwiz/view/nav.php'; ?>

    <div class="content">
        <h2>Baseline Test</h2>
        <p>&nbsp;&nbsp;&nbsp; You will have 48 questions to answer. They will go over addition, subtraction, multiplication and division. How you do on this test will set what types of drills and tests you will have in the future.</p>


        <table><form action="index.php" method="post" enctype="multipart/form-data">
                <tr>
                    <th>Addition Level 1</th>
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
                        <td><input type="text" name="<?php echo ++$a; ?>">
                    </tr>
                <?php endforeach; ?>

        </table>
        <input type="hidden" name="action" value="commitResults">
        <input type="submit" value="Submit Answers">
        </form>
    </div>


    <?php include '/xampp/htdocs/mathwiz/view/footer.php'; ?>
