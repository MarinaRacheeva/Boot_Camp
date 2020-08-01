<?php
require 'includes/lib.php';
function clearStr($data) 
{
    global $link;
    $data = trim(strip_tags($data));
    return mysqli_real_escape_string($link, $data);
}
function clearInt($data)
{
    return abs((int)$data);
}

// если получаем данные из формы обратной связи, то записываем их в БД и отправляем письмом
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = clearStr($_POST["feedback-author"]);
    $email = clearStr($_POST["email"]);
    $phone = clearStr($_POST["phone"]);
    $text = clearStr($_POST["feedback-text"]);
    $sql = "INSERT INTO Feedback (name, e_mail, phone, text) VALUES ('$name', '$email', '$phone', '$text')";
    $res = mysqli_query($link, $sql);
    if (!$res) 
    {
        echo 'Ошибка: ' . mysqli_errno($link) . ':' . mysqli_error($link);
    }
    else 
    {
        $mailto = 'test@maill.ru';
        $subject = 'Feedback';
        $msg  = 'Сообщение от пользователя: <b>'.$name.'</b><br>';
        $msg .= 'E-mail пользователя: <a href="mailto:' . $email . '">' . $email . '</a><br>';
        if (!$phone)
            $msg .= 'Номер телефона не указан';
        else
            $msg .= 'Номер телефона: ' . $phone . '<br>';
        $msg .= 'Текст сообщения: ' . $text . '<br>'; 
        $headers = 'Content-type: text/html; charset=utf-8';
        $mail = mail($mailto, $subject, $msg, $headers);
    }
 
    if (!$mail)
        echo '<p class="success">Ошибка отправки</p>';
    else
        header("Location: " . $_SERVER["REQUEST_URI"]);
        echo '<p>Благодарим за ваше письмо. Мы свяжемся с вами в ближайшее время.</p>';    
        exit;
} 