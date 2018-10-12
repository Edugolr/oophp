<?php
namespace Chai17\Filter;

include(__DIR__ . "/../../vendor/autoload.php");
$converter = new Filter;
$text = file_get_contents(__DIR__ . "/text/sample.md");
$filter = ["markdown"];
$html = $converter->parse($text, $filter);




?>
<div class="nav2">
    <a href="bbcode">Bbcode</a> <a href="markdown">Markdown</a>
    <a href="link">Link</a>
</div>

<h1>Showing off Markdown</h1>

<h2>Markdown source in sample.md</h2>
<pre><?= $text ?></pre>

<h2>Text formatted as HTML source</h2>
<pre><?= htmlentities($html) ?></pre>

<h2>Text displayed as HTML</h2>
<?= $html ?>
