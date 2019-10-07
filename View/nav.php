<div id="nav">
    <table>
        <tr>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" value="home" name="action">
                    <input class="button" type="submit" value="Home">
                </form>
            </td>

            <?php if (isset($_SESSION)) { ?>
                <?php if (empty($_SESSION['loggedInUser'])) { ?>
                    <td>
                        <form action="index.php" method="post">
                            <input type="hidden" value="login" name="action">
                            <input class="button" type="submit" value="Login">
                        </form>
                    </td>
                <?php } ?>
            <?php } ?>

            <?php if (isset($_SESSION)) { ?>
                <?php if (!empty($_SESSION['loggedInUser'])) { ?>
                    <td>
                        <form action="index.php" method="post">
                            <input type="hidden" value="profile" name="action">
                            <input class="button" type="submit" value="Profile">
                        </form>
                    </td>
                <?php } ?>
            <?php } ?>

            <?php if (isset($_SESSION)) { ?>
                <?php if (!empty($_SESSION['loggedInUser']) && $_SESSION['userType'] == 'student') { ?>
                    <td>
                        <form action="index.php" method="post">
                            <input type="hidden" value="drills" name="action">
                            <input class="button" type="submit" value="Drills">
                        </form>
                    </td>
                <?php } ?>
            <?php } ?>

            <?php if (isset($_SESSION)) { ?>
                <?php if (!empty($_SESSION['loggedInUser']) && $_SESSION['userType'] == 'student') { ?>
                    <td>
                        <form action="index.php" method="post">
                            <input type="hidden" value="tests" name="action">
                            <input class="button" type="submit" value="Master Tests">
                        </form>
                    </td>
                <?php } ?>
            <?php } ?>

            <?php if (isset($_SESSION)) { ?>
                <?php if (!empty($_SESSION['loggedInUser']) && $_SESSION['userType'] == 'student') { ?>
                    <?php if ($_SESSION['loggedInUser']->getAdditionLevel() == 1) { ?>
                        <td>
                            <form action="index.php" method="post">
                                <input type="hidden" value="baseline" name="action">
                                <input class="button" type="submit" value="Baseline Test">
                            </form>
                        </td>
                    <?php } ?>
                <?php } ?>
            <?php } ?>

            <?php if (isset($_SESSION['loggedInUser'])) { ?>
                <td>
                    <form action="index.php" method="post">
                        <input type="hidden" value="logout" name="action">
                        <input class="button" type="submit" value="Logout">
                    </form>
                </td>
            <?php } ?>
        </tr>
    </table>
</div>


<!--  <form action="index.php" method="post">
      <input type="hidden" value="viewStudent" name="action">
      <input class="button" type="submit" value="Profile">
  </form>
  <form action="index.php" method="post">
      <input type="hidden" value="viewStudent" name="action">
      <input class="button" type="submit" value="Log Out">
  </form>
  <form action="index.php" method="post">
      <input type="hidden" value="drills" name="action">
      <input class="button" type="submit" value="Drills">
  </form>
  <form action="index.php" method="post">
      <input type="hidden" value="profile" name="action">
      <input type="submit" value="Profile">
  </form> class="button"
  <form action="index.php" method="post">
      <input type="hidden" value="addNewProp" name="action">
      <input type="submit" value="Add">
  </form>
  <form action="index.php" method="post">
      <input type="hidden" name="action" value="logout" >
      <input type="submit" value="Logout">
  </form> -->
