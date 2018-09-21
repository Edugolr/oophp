<?php

namespace Chai17\Dice;

include(__DIR__ . "/../../vendor/autoload.php");

if (!isset($game)) {
    $game = new DiceHand(3);
}
$game = new DiceHand(3);
$_SESSION['turntotal'] = $_SESSION['turntotal'] ?? 0;
$_SESSION['total'] = $_SESSION['total'] ?? 0;
$_SESSION['computerTotal'] = $_SESSION['computerTotal'] ?? 0;
?>
<h1>Welcome to dicepig</h1>
<p>The goal is to reach a 100 points.
You roll 3 dices if then you can choose to roll again or save the score and end your turn.
If you roll a 1 you loose your turn and the points. </p>
<?php
if (isset($_POST['roll'])) {
    $game->roll();
    $_SESSION['turntotal'] = $_SESSION['turntotal'] + $game->sum();
    ?>
    <div class="floatright">
        <p class="dice-utf8">
        <?php foreach ($game->values() as $value) : ?>
            <i class="dice-<?= $value ?>"></i>
        <?php endforeach; ?>
        </p>
    </div>
    <?php
    if (in_array("1", $game->values())) {
        ?>
            <p>You rolled a 1, you lost your points and its the computers turn </p>
        <?php
        $_SESSION['turntotal'] = 0;
        $game->roll();
        if (!in_array("1", $game->values())) {
            $_SESSION['computerTotal'] = $_SESSION['computerTotal'] + $game->sum();
            if ($_SESSION['computerTotal'] > 100) {
                ?> <h3>Computer won the game!</h3> <?php
            }
        }
    }
}
if (isset($_POST['save'])) {
    $_SESSION['total'] = $_SESSION['total'] + $_SESSION['turntotal'];
    $_SESSION['turntotal'] = 0;
    if ($_SESSION['total'] > 100) {
        ?> <h3>Congratulations you won the game!</h3> <?php
    }
}
if (isset($_POST['reset'])) {
    $_SESSION['total'] = 0;
    $_SESSION['turntotal'] = 0;
    $_SESSION['computerTotal'] = 0;
}
?>
<div>
    <form class=""  method="post">
        <input class="btn" type="submit" name="roll" value="roll">
        <input class="btn orange" type="submit" name="save" value="save">
        <input class="btn red" type="submit" name="reset" value="reset">
    </form>
    <p>Total to add: <?=$_SESSION['turntotal'] ?></p>
    <p>Total points: <?=$_SESSION['total'] ?> </p>
    <p>Computers Total points <?=$_SESSION['computerTotal']?> </p>
</div>

<?php
