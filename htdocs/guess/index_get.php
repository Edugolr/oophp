<?php

include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");


$number = $_GET['number'] ?? -1;
$tries = $_GET['tries'] ?? 6;
$guess =  $_GET['guess'] ?? null;
$game = new Guess($number, $tries);

if ($number == -1) {
    $game->random();
}
if (isset($_GET['reset'])) {
    $game->random();
}
$res = null;
if (isset($_GET['doGuess'])) {
    $res = $game->makeGuess($guess);
}
?>
<!doctype html>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<div class="game">
    <h1>Guess a number between 1 and 100</h1>
    <p class="tries" >you have: <?php echo $game->tries(); ?> guesses left</p>
    <form action="index_get.php" method="get">
        <input type="hidden" name="tries" value="<?php echo $game->tries(); ?>"><br>
        <input type="hidden" name="number" value="<?php echo $game->number(); ?>"><br>
        <input autofocus type="number" name="guess"><br>
    <input name="doGuess" type="submit" value="Make a guess">
    <input name="reset" type="submit" value="Reset">
    <input name="cheat" type="submit" value="Cheat">
    </form>
    <?php if (isset($res)) : ?>
        <p class="guess">You guessed <?= $guess ?>: <?= $res ?> </p>
    <?php endif; ?>

    <?php if (isset($_GET['cheat'])) : ?>
        <p class="cheat">Cheat: <?= $game->number(); ?> </p>
    <?php endif; ?>
</div>
