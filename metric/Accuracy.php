<?php
/**
 * Класс для вычисления точности классификатора.
 * Вычисляет расхождение данных
 *
 * Created by PhpStorm.
 * User: am_ry
 * Date: 07.09.2018
 * Time: 14:22
 */

require_once __DIR__ . '/../vendor/autoload.php';

use \Phpml\Metric\Accuracy;

$actualLabels = ['a', 'b', 'a', 'b'];
$predictedLabels = ['a', 'a', 'a', 'b'];

print_r(Accuracy::score($actualLabels, $predictedLabels));
// return 0.75

echo "\n";
print_r(Accuracy::score($actualLabels, $predictedLabels, false));
// return 3