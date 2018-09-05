<?php
/**
 * Классификатор, реализующий Vector Vector Machine на основе libsvm.
 * https://ru.wikipedia.org/wiki/%D0%9C%D0%B5%D1%82%D0%BE%D0%B4_%D0%BE%D0%BF%D0%BE%D1%80%D0%BD%D1%8B%D1%85_%D0%B2%D0%B5%D0%BA%D1%82%D0%BE%D1%80%D0%BE%D0%B2
 *
 * User: am_ry
 * Date: 05.09.2018
 * Time: 16:00
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Phpml\Classification\SVC;
use Phpml\SupportVectorMachine\Kernel;

$samples = [[1, 3], [1, 4], [2, 4], [3, 1], [4, 1], [4, 2]];
$labels = ['a', 'a', 'a', 'b', 'b', 'b'];

$classifier = new SVC(Kernel::LINEAR, $cost = 1000);
$classifier->train($samples, $labels);

print_r($classifier->predict([[3, 2], [1, 5]]));
