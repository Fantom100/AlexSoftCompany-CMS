<?php
/**
 * User: Александр
 * Date: 26.10.15
 * Time: 17:15
 * Файл инициализации каптчи
 */
session_start();
$_SESSION['source'] = rand(1000,9999);
?>
<br/>
<img src="generate.php" alt="Captcha code"/><br/>
<form action="check.php" method="post">
    Type the value you see: <input type="text" size="6" name="source"/>
    <button type="submit">Send value</button>
</form>
