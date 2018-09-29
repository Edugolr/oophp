<?php

namespace Chai17\Dice;

include(__DIR__ . "/../../vendor/autoload.php");

$action = $action ?? null;
$method = $method ?? null;
?>

<h4>Congratulations <?=$game->getActiveName() ?> you won the Dice pig game</h4>
<form class="" action=<?=$action ?> method=<?=$method ?> >
    <input class="btn red" type="submit" name="reset" value="reset">
</form>
