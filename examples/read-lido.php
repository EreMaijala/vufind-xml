<?php

/**
 * An example for reading contents of a LIDO record.
 *
 * PHP version 8
 *
 * Copyright (C) 2026 University of Helsinki, National library of Finland.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, see
 * <https://www.gnu.org/licenses/>.
 *
 * @category VuFindXml
 * @package  VuFindXml
 * @author   Ere Maijala <ere.maijala@helsinki.fi>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     https://github.com/vufind-org/vufind-xml Git Repo
 */

require 'vendor/autoload.php';

$ns = 'http://www.lido-schema.org';
$xmlDoc = new \VuFindXml\XmlDoc();
$xmlDoc->parse(file_get_contents(__DIR__ . '/../tests/fixtures/xml-with-ns.xml'));

// Option 1: Explicitly defined namespace for each path element:
$nsClark = '{' . $ns . '}';
$path = "{$nsClark}lido/{$nsClark}descriptiveMetadata/{$nsClark}objectIdentificationWrap/{$nsClark}titleWrap/"
    . "{$nsClark}titleSet/{$nsClark}appellationValue";
$preferred = [];
$alternative = [];
foreach ($xmlDoc->all(path: $path) as $title) {
    $pref = $xmlDoc->attr($title, "$ns pref");
    if ('preferred' === $pref) {
        $preferred[] = $xmlDoc->value($title);
    } elseif ('alternative' === $pref) {
        $alternative[] = $xmlDoc->value($title);
    }
}
echo "Preferred titles: " . PHP_EOL . implode(PHP_EOL, $preferred) . PHP_EOL . PHP_EOL;
echo "Alternative titles: " . PHP_EOL . implode(PHP_EOL, $preferred) . PHP_EOL . PHP_EOL;

// Option 2: Default namespace:
$xmlDoc->setDefaultNamespace($ns);
$path = "lido/descriptiveMetadata/objectIdentificationWrap/titleWrap/titleSet/appellationValue";
$preferred = [];
$alternative = [];
foreach ($xmlDoc->all(path: $path) as $title) {
    $pref = $xmlDoc->attr($title, "pref");
    if ('preferred' === $pref) {
        $preferred[] = $xmlDoc->value($title);
    } elseif ('alternative' === $pref) {
        $alternative[] = $xmlDoc->value($title);
    }
}
echo "Preferred titles: " . PHP_EOL . implode(PHP_EOL, $preferred) . PHP_EOL . PHP_EOL;
echo "Alternative titles: " . PHP_EOL . implode(PHP_EOL, $preferred) . PHP_EOL . PHP_EOL;

// Option 3: Path as an array:
$path = [
    "$ns lido",
    "$ns descriptiveMetadata",
    "$ns objectIdentificationWrap",
    "$ns titleWrap",
    "$ns titleSet",
    "$ns appellationValue"
];
$preferred = [];
$alternative = [];
foreach ($xmlDoc->all(path: $path) as $title) {
    $pref = $xmlDoc->attr($title, "$ns pref");
    if ('preferred' === $pref) {
        $preferred[] = $xmlDoc->value($title);
    } elseif ('alternative' === $pref) {
        $alternative[] = $xmlDoc->value($title);
    }
}
echo "Preferred titles: " . PHP_EOL . implode(PHP_EOL, $preferred) . PHP_EOL . PHP_EOL;
echo "Alternative titles: " . PHP_EOL . implode(PHP_EOL, $preferred) . PHP_EOL . PHP_EOL;
