<?php

// Autoload files using the Composer autoloader.
require_once __DIR__ . '/vendor/autoload.php';

use Main\Main;
use Classes\SaveJson;
use Classes\PrintData;

$entry = new Main();
$save = new SaveJson();
$print = new PrintData();
echo($save->savingJson('root', 'bynbnf', $entry->getData('https://trial.craig.mtcserver15.com/api/properties')));
echo($print->printingData());
