<?php
/**
 * Классификатор, реализующий алгоритм k-ближайших соседей.
 * https://ru.wikipedia.org/wiki/%D0%9C%D0%B5%D1%82%D0%BE%D0%B4_k-%D0%B1%D0%BB%D0%B8%D0%B6%D0%B0%D0%B9%D1%88%D0%B8%D1%85_%D1%81%D0%BE%D1%81%D0%B5%D0%B4%D0%B5%D0%B9
 * Находится k-ближайших соседей каких соседий больше те и победили. Расстояние межу k соседями не учитывается
 * User: am_ry
 * Date: 05.09.2018
 * Time: 15:56
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Phpml\Classification\KNearestNeighbors;
use Phpml\Math\Distance\Euclidean;

// 0 1 2 3 4 5
// 1     a a *
// 2       a
// 3 b *
// 4 b b

$samples = [[1, 3], [1, 4], [2, 4], [3, 1], [4, 1], [4, 2]];
$labels = ['a', 'a', 'a', 'b', 'b', 'b'];

/**
 * $k - количество ближайших соседей для сканирования (по умолчанию: 3)
 * $distanceMetric - Расстояние объекта, по умолчанию Euclidean (см. документацию по дальности )
 */

$classifier = new KNearestNeighbors(3, new Euclidean());
$classifier->train($samples, $labels);

print_r($classifier->predict([[3, 2], [1, 5]]));