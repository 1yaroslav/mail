<?php
 
// Подключаем библиотеку PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';
 
// Создаем письмо
$mail = new PHPMailer();
$mail->isSMTP();                   // Отправка через SMTP
$mail->Host   = 'smtp.gmail.ru';  // Адрес SMTP сервера
$mail->SMTPAuth   = true;          // Enable SMTP authentication
$mail->Username   = 'мой логин';       // ваше имя пользователя (без домена и @)
$mail->Password   = 'пароль';    // ваш пароль
$mail->SMTPSecure = 'ssl';         // шифрование ssl
$mail->Port   = 465;               // порт подключения
 
$mail->setFrom('почта отправителя', 'Иван Иванов');    // от кого
$mail->addAddress('почта получателя', 'Вася Петров'); // кому
 
$mail->Subject = 'Тест';
$mail->msgHTML("<html><body>
                <h1>Здравствуйте!</h1>
                <p>Это тестовое письмо.</p>
                </html></body>");
// Отправляем
if ($mail->send()) {
  echo 'Письмо отправлено!';
} else {
  echo 'Ошибка: ' . $mail->ErrorInfo;
}
?>
