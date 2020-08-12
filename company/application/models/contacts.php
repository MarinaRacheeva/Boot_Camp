<?php require 'includes/lib.php';
// если получаем данные из формы обратной связи, то записываем их в БД и отправляем письмом
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = clearStr($_POST["feedback-author"]);
        $email = clearStr($_POST["email"]);
        $phone = clearStr($_POST["phone"]);
        $text = clearStr($_POST["feedback-text"]);
        $sql = "INSERT INTO Feedback (name, e_mail, phone, text) VALUES ('$name', '$email', '$phone', '$text')";
        $res = getResult($sql);
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
                $msg .= 'Номер телефона не указан <br>';
            else
                $msg .= 'Номер телефона: ' . $phone . '<br>';
            $msg .= 'Текст сообщения: ' . $text . '<br>'; 
            $headers = 'Content-type: text/html; charset=utf-8';
            $mail = mail($mailto, $subject, $msg, $headers);
        }
    }