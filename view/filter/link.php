<?php
namespace Chai17\Filter;

include(__DIR__ . "/../../vendor/autoload.php");
$converter = new Filter;
$text = file_get_contents(__DIR__ . "/text/clickable.txt");
$filter = ["link", "nl2br"];
$html = $converter->parse($text, $filter);


?>
<div class="nav2">
    <a href="bbcode">Bbcode</a> <a href="markdown">Markdown</a>
    <a href="link">Link</a>
</div>

<h1>Showing off Clickable</h1>

<h2>Source in clickable.txt</h2>
<pre><?= wordwrap(htmlentities($text)) ?></pre>

<h2>Source formatted as HTML</h2>
<?= $text ?>

<h2>Filter Clickable applied, source</h2>
<pre><?= wordwrap(htmlentities($html)) ?></pre>

<h2>Filter Clickable applied, HTML</h2>
<?= $html ?>
