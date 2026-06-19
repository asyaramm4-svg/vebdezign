<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем и очищаем данные
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Проверяем обязательные поля
    if (empty($name) || empty($email) || empty($message)) {
        echo "Пожалуйста, заполните все поля.";
        exit;
    }

    // Настройки письма
    $to = 'asyaramm4@gmail.com'; // Замените на ваш email
    $subject = 'Новая заявка с сайта: ' . $name;
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Тело письма
    $body = "Имя: $name\nEmail: $email\nСообщение:\n$message";

    // Отправляем письмо
    if (mail($to, $subject, $body, $headers)) {
        echo 'Спасибо! Ваше сообщение отправлено.';
    } else {
        echo 'Произошла ошибка при отправке. Попробуйте позже.';
    }
}
?>