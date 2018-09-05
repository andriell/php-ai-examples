<?php

/**
 * Алгоритм K-Средств кластеризует данные, пытаясь отделить выборки в n группах равных дисперсий, сводя к минимуму критерий, известный как инерция или внутрикластерная сумма квадратов. Для этого алгоритма необходимо указать количество кластеров.
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
