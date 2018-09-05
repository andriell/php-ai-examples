<?php

/**
 * Created by PhpStorm.
 * User: am_ry
 * Date: 05.09.2018
 * Time: 16:45
 */

require_once __DIR__ . '/../vendor/autoload.php';

use \Phpml\Classification\NaiveBayes;

$samples = [[5, 1, 1], [1, 5, 1], [1, 1, 5]];
$labels = ['a', 'b', 'c'];

$classifier = new NaiveBayes();
$classifier->train($samples, $labels);

print_r($classifier->predict([[3, 1, 1], [1, 4, 1]]));
