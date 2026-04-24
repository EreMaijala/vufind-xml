<?php

/**
 * An example for handling the root node.
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
$xmlDoc->parse(file_get_contents(__DIR__ . '/../tests/fixtures/mixed-content.xml'));

// Get attributes and text content from root node:
$root = $xmlDoc->root();
echo "Local extra attribute: " . $xmlDoc->attr($root, '{http://localhost}extra') . PHP_EOL;
echo "Root node text: " . $xmlDoc->value($root) . PHP_EOL;
