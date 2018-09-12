<?php

include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

session_start();

$_SESSION["number"] = $_POST['number'] ?? -1;
$_SESSION["tries"] = $_POST['tries'] ?? 6;
$_SESSION["guess"] =  $_POST['guess'] ?? null;
$game = new Guess($_SESSION["number"], $_SESSION["tries"]);

if ($_SESSION["number"] == -1) {
    $game->random();
}
if (isset($_POST['reset'])) {
    $game->random();
}

$_SESSION["res"] = null;
if (isset($_POST['doGuess'])) {
    $_SESSION["res"] = $game->makeGuess($_SESSION["guess"]);
}

?>
<!doctype html>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<div class="game">
    <h1>Guess a number between 1 and 100</h1>
    <p class="tries" >you have: <?php echo $game->tries(); ?> guesses left</p>
    <form action="index_session.php" method="post">
        <input type="hidden" name="tries" value="<?php echo $game->tries(); ?>"><br>
        <input type="hidden" name="number" value="<?php echo $game->number(); ?>"><br>
        <input autofocus type="number" name="guess"><br>
    <input name="doGuess" type="submit" value="Make a guess">
    <input name="reset" type="submit" value="Reset">
    <input name="cheat" type="submit" value="Cheat">
    </form>
    <?php if (isset($_SESSION["res"])) : ?>
        <p class="guess">You guessed <?= $_SESSION["guess"] ?>: <?= $_SESSION["res"] ?> </p>
    <?php endif; ?>

    <?php if (isset($_POST['cheat'])) : ?>
        <p class="cheat">Cheat: <?= $game->number(); ?> </p>
    <?php endif; ?>
</div>
