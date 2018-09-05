<?php

/**
 * Алгоритм K-средних кластеризует данные, пытаясь отделить выборки в n группах равных дисперсий, сводя к минимуму критерий, известный как инерция или внутрикластерная сумма квадратов. Для этого алгоритма необходимо указать количество кластеров.
 * https://ru.wikipedia.org/wiki/%D0%9C%D0%B5%D1%82%D0%BE%D0%B4_k-%D1%81%D1%80%D0%B5%D0%B4%D0%BD%D0%B8%D1%85
 *
 * Created by PhpStorm.
 * User: am_ry
 * Date: 05.09.2018
 * Time: 17:29
 */
require_once __DIR__ . '/../vendor/autoload.php';

use Phpml\Clustering\KMeans;

$samples = [[1, 1], [8, 7], [1, 2], [7, 8], [2, 1], [8, 9]];

$kmeans = new KMeans(2);
print_r($kmeans->cluster($samples));
