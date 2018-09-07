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
        for ($i = 0; $i < 10; $i++) {
            $img = $this->image->clone();
            $img->gaussianBlurImage($i, $i);
            $img->setImageFormat ("png");
            $img->writeImage($this->tmpDir . '/gaussian-' . $i . '.png');
        }
    }

}