<?php
require 'vendor/autoload.php';

$ns = 'http://www.lido-schema.org';
$xmlDoc = new \VuFindXml\XmlDoc();
$xmlDoc->parse(file_get_contents(__DIR__ . '/../tests/fixtures/mixed-content.xml'));

// Get attributes and text content from root node:
$root = $xmlDoc->root();
echo "Local extra attribute: " . $xmlDoc->attr($root, '{http://localhost}extra') . PHP_EOL;
echo "Root node text: " . $xmlDoc->value($root) . PHP_EOL;