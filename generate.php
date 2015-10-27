<?php
/**
 * User: Александр
 * Date: 26.10.15
 * Time: 17:18
 * Файл генерации каптчи - модель для генерации в класс Captcha.class.php который будет в dir class/Security/
 */
session_start();
$_SESSION['source'] = rand(1000,9999);

include_once 'class/Captcha.class.php';

$captcha = new Captcha(); //Инициализация класса капчи

echo $captcha->generate(); //запуск итогового изображения
//Запуск из кприватного класса echo $captcha::generate();
