<?php
/**
 * Created by PhpStorm.
 * User: am_ry
 * Date: 07.09.2018
 * Time: 14:28
 */
require_once __DIR__ . '/../vendor/autoload.php';

use Phpml\Metric\ClassificationReport;

$actualLabels = ['cat', 'ant', 'bird', 'bird', 'bird'];
$predictedLabels = ['cat', 'cat', 'bird', 'bird', 'ant'];

$report = new ClassificationReport($actualLabels, $predictedLabels);

$report->getPrecision(); // точность - доля извлеченных экземпляров, которые являются релевантными
// ['cat' => 0.5, 'ant' => 0.0, 'bird' => 1.0]

$report->getRecall(); // Отзыв - доля соответствующих экземпляров, которые извлекаются
// ['cat' => 1.0, 'ant' => 0.0, 'bird' => 0.67]

$report->getF1score(); //  - показатель точности теста
// ['cat' => 0.67, 'ant' => 0.0, 'bird' => 0.80]

$report->getSupport(); //  - количество образцов семенников
// ['cat' => 1, 'ant' => 1, 'bird' => 3]

$report->getAverage();
// ['precision' => 0.5, 'recall' => 0.56, 'f1score' => 0.49]