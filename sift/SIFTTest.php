<?php
/**
 * Created by PhpStorm.
 * User: am_ry
 * Date: 07.09.2018
 * Time: 16:55
 */


include_once('SIFT.php');

$sift = new SIFT();

$sift->setImage(__DIR__ . '/beaver.png');
$sift->setTmpDir(__DIR__ . '/tmp');
$sift->calculateBlur();