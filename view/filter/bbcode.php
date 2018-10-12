<?php
namespace Chai17\Filter;

include(__DIR__ . "/../../vendor/autoload.php");
$converter = new Filter;
$text = file_get_contents(__DIR__ . "/text/bbcode.txt");
$filter = ["bbcode"];
$html = $converter->parse($text, $filter);


?>
<div class="nav2">
    <a href="bbcode">Bbcode</a> <a href="markdown">Markdown</a>
    <a href="link">Link</a>
</div>
<h1>Showing off BBCode</h1>

<h2>Source in bbcode.txt</h2>
<pre><?= wordwrap(htmlentities($text)) ?></pre>

<h2>Filter BBCode applied, source</h2>
<pre><?= wordwrap(htmlentities($html)) ?></pre>

<h2>Filter BBCode applied, HTML (including nl2br())</h2>
<?= nl2br($html) ?>
