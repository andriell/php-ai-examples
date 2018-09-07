<?php

/**
 * Created by PhpStorm.
 * User: am_ry
 * Date: 07.09.2018
 * Time: 16:49
 */
class SIFT
{
    /** @var \Imagick  */
    private $image = null;
    /** @var string */
    private $tmpDir = null;


    /**
     * @param string $imagePath
     */
    public function setImage($imagePath)
    {
        $this->image = new \Imagick($imagePath);
    }

    /**
     * @param string $tmpDir
     */
    public function setTmpDir($tmpDir)
    {
        $this->tmpDir = $tmpDir;
    }

    public function calculateBlur()
    {
        $imgGaussian = [];
        for ($i = 0; $i < 10; $i++) {
            $imgGaussian[$i] = clone $this->image;
            $imgGaussian[$i]->gaussianBlurImage($i, $i);
            $imgGaussian[$i]->setImageFormat ("png");
            $imgGaussian[$i]->writeImage($this->tmpDir . '/gaussian-' . $i . '.png');
        }
        /** @var \Imagick[] $imgDOG */
        $imgDOG = [];
        for ($i = 0; $i < 9; $i++) {
            $draw = new \ImagickDraw();
            for ($x = 0; $x < $this->image->getImageWidth(); $x++) {
                for ($y = 0; $y < $this->image->getImageHeight(); $y++) {
                    /** @var ImagickPixel $color1 */
                    $color1 = $imgGaussian[$i]->getImagePixelColor($x, $y);
                    /** @var ImagickPixel $color2 */
                    $color2 = $imgGaussian[$i + 1]->getImagePixelColor($x, $y);
                    /** @var ImagickPixel $color3 */
                    $color3 = new ImagickPixel();
                    $color3->setColorValue(\Imagick::COLOR_RED, $color1->getColorValue(\Imagick::COLOR_RED) - $color2->getColorValue(\Imagick::COLOR_RED));
                    $color3->setColorValue(\Imagick::COLOR_GREEN, $color1->getColorValue(\Imagick::COLOR_GREEN) - $color2->getColorValue(\Imagick::COLOR_GREEN));
                    $color3->setColorValue(\Imagick::COLOR_BLUE, $color1->getColorValue(\Imagick::COLOR_BLUE) - $color2->getColorValue(\Imagick::COLOR_BLUE));
                    $draw->setFillColor($color3);
                    $draw->point($x,$y);
                }
            }
            $imgDOG[$i] = new Imagick();
            $imgDOG[$i]->newImage($this->image->getImageWidth(), $this->image->getImageHeight(), new ImagickPixel('red'));
            $imgDOG[$i]->drawImage($draw);
            $imgDOG[$i]->setImageFormat ("png");
            $imgDOG[$i]->writeImage($this->tmpDir . '/dog-' . $i . '.png');
        }
    }

}