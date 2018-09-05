<?php
/**
 * Линейная регрессия LeastSquares
 *
 *
 * User: am_ry
 * Date: 05.09.2018
 * Time: 17:19
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Phpml\Regression\LeastSquares;


$samples = [[60], [61], [62], [63], [65]];
$targets = [3.1, 3.6, 3.8, 4, 4.1];

$regression = new LeastSquares();
$regression->train($samples, $targets);

print_r($regression->predict([64]));
echo "\n";

$samples = [[73676, 1996], [77006, 1998], [10565, 2000], [146088, 1995], [15000, 2001], [65940, 2000], [9300, 2000], [93739, 1996], [153260, 1994], [17764, 2002], [57000, 1998], [15000, 2000]];
$targets = [2000, 2750, 15500, 960, 4400, 8800, 7100, 2550, 1025, 5900, 4600, 4400];

$regression = new LeastSquares();
$regression->train($samples, $targets);
print_r($regression->predict([60000, 1996]));