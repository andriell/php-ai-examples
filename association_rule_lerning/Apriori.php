<?php
/**
 * Обучение правилам ассоциации, основанное на алгоритме Apriori, для частых заданий.
 * https://ru.wikipedia.org/wiki/%D0%90%D0%BB%D0%B3%D0%BE%D1%80%D0%B8%D1%82%D0%BC_Apriori
 * Какие сочитания самые частые
 * Created by PhpStorm.
 * User: am_ry
 * Date: 05.09.2018
 * Time: 16:57
 */
require_once __DIR__ . '/../vendor/autoload.php';

$samples = [['alpha', 'beta', 'epsilon'], ['alpha', 'beta', 'theta'], ['alpha', 'beta', 'epsilon'], ['alpha', 'beta', 'theta']];
$labels  = [];

use Phpml\Association\Apriori;

$associator = new Apriori($support = 0.5, $confidence = 0.5);
$associator->train($samples, $labels);

print_r($associator->predict([['alpha','epsilon'],['beta','theta']]));

print_r($associator->getRules());