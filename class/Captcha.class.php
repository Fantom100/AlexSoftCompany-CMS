<?php
/**
 * User: Александр
 * Date: 28.10.15
 * Time: 0:29
 * Captcha generate image use here
 */
class Captcha
{
    public $path_font = 'fonts/GoodDog.ttf';

    public $font_size    = 30;
    public $image_width  = 120;
    public $image_height = 40;

    public function getSessionText()
    {
        $text = $_SESSION['source'];

        return $text;
    }

    public function image()
    {
        $image = imagecreate($this->image_width, $this->image_height);
        $test = imagecolorallocate($image, 255, 255, 255); //Установка цвета линий at default value - он чёрный

        return $test;
    }

    public function textColor()
    {
        return imagecolorallocate($this->image(), 0, 0, 0);
    }

    public function generate()
    {
        /*Creating images )*/
        $image = imagecreate($this->image_width, $this->image_height);
        imagecolorallocate($image, 255, 255, 255); //Установка цвета линий at default value - он чёрный
        $text_color = imagecolorallocate($image, 0, 0, 0);

        for($x = 1; $x <= 30; $x++):
            $x1 = rand(1, 100);
            $y1 = rand(1, 100);
            $x2 = rand(1, 150);
            $y2 = rand(1, 150);

            imageline($image, $x1, $y1, $x2, $y2, $text_color);
        endfor;

        imagettftext($image, $this->font_size, 0, 15, 30, $text_color, $this->path_font, $this->getSessionText());
        $create = imagejpeg($image); //Creating finishing image

        return $create;
    }
}
