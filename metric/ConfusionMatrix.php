<?php

/**
 * Created by PhpStorm.
 * User: am_ry
 * Date: 07.09.2018
 * Time: 14:25
 */
require_once __DIR__ . '/../vendor/autoload.php';

use \Phpml\Metric\ConfusionMatrix;

$actualTargets = [2, 0, 2, 2, 0, 1];
$predictedTargets = [0, 0, 2, 2, 0, 2];

/*
$confusionMatrix = [
    [2, 0, 0],
    [0, 0, 1],
    [1, 0, 2],
];
*/

$confusionMatrix = ConfusionMatrix::compute($actualTargets, $predictedTargets);
print_r($confusionMatrix);

$actualTargets = ['cat', 'ant', 'cat', 'cat', 'ant', 'bird'];
$predictedTargets = ['ant', 'ant', 'cat', 'cat', 'ant', 'cat'];
/*
$confusionMatrix = [
    [2, 0],
    [0, 0],
];
*/

$confusionMatrix = ConfusionMatrix::compute($actualTargets, $predictedTargets, ['ant', 'bird']);
print_r($confusionMatrix);
