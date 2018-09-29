<?php

namespace Chai17\Dice;

include(__DIR__ . "/../../vendor/autoload.php");
$action = $action ?? null;
$method = $method ?? null;
?>

<div class="welcome container">
    <h1>Welcome to dicepig</h1>
    <p>The goal is to reach a 100 points.
    You roll 3 dices if then you can choose to roll again or save the score and end your turn.
    If you roll a 1 you loose your turn and the points. </p> <br><br>
</div>

<form action="<?=$action ?>"method="<?=$method ?>">
        <div class="group">
          <input type="text"  name="name" value="John Doe">
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>Name</label>
        </div>

        <div class="group">
          <input type="number" min=1 name="dices" value="2">
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>Number of Dices (1-*)</label>
        </div>

        <div class="group">
          <input type="number" min=2 max=6 name="sides" value="6">
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>Sides on dice (2-6)</label>
        </div>

        <div class="group">
          <input type="number"  name="winpoint" value="100">
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>Winning points</label>
        </div>
    <input class="btn" type="submit" name="" value="start">
</form>
