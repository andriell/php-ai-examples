<?php

/**
 * Класс, реализующий векторную регрессию с поддержкой Epsilon на основе libsvm.
 *
 * Created by PhpStorm.
 * User: am_ry
 * Date: 05.09.2018
 * Time: 17:23
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Phpml\Regression\SVR;
use Phpml\SupportVectorMachine\Kernel;

$samples = [[60], [61], [62], [63], [65]];
$targets = [3.1, 3.6, 3.8, 4, 4.1];

$regression = new SVR(Kernel::LINEAR);
$regression->train($samples, $targets);
echo $regression->predict([64]);
