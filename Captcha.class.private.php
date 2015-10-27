<?php
class Captcha
{
    private static $path_font = 'fonts/GoodDog.ttf';

    private static $font_size    = 30;
    private static $image_width  = 120;
    private static $image_height = 40;

    private static function getSessionText()
    {
        $text = $_SESSION['source'];

        return $text;
    }

    public function image()
    {
        $image = imagecreate(self::$image_width, self::$image_height);
        $test = imagecolorallocate($image, 255, 255, 255); //Установка цвета линий at default value - он чёрный

        return $test;
    }

    public function textColor()
    {
        return imagecolorallocate($this->image(), 0, 0, 0);
    }

    public static function generate()
    {
        /*Creating images )*/
        $image = imagecreate(self::$image_width, self::$image_height);
        imagecolorallocate($image, 255, 255, 255); //Установка цвета линий at default value - он чёрный
        $text_color = imagecolorallocate($image, 0, 0, 0);

        for($x = 1; $x <= 30; $x++):
            $x1 = rand(1, 100);
            $y1 = rand(1, 100);
            $x2 = rand(1, 150);
            $y2 = rand(1, 150);

            imageline($image, $x1, $y1, $x2, $y2, $text_color);
        endfor;

        imagettftext($image, self::$font_size, 0, 15, 30, $text_color, self::$path_font, self::getSessionText());
        $create = imagejpeg($image); //Creating finishing image

        return $create;
    }
}
