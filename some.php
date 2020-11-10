<?php
$dsn = "mysql:host=localhost;dbname=test;charset=utf8";
$dbuser = "root";
$dbpass = "mysql";

try {
    $connection = new PDO($dsn, $dbuser, $dbpass);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['name']) && isset($_POST['tel']) && isset($_POST['email'])) {
        // Добавить в асоц массив
        // применить к каждомк элементу массива ф-ую {strip_tags, htmlentities}
        $name  = strip_tags($_POST['name']);
        $name  = htmlentities($_POST['name']);
        $email = strip_tags($_POST['email']);
        $email = htmlentities($_POST['email']);
        $tel   = strip_tags($_POST['tel']);
        $tel   = htmlentities($_POST['tel']);

        $moment     = new DateTime();
        $momentUnix = $moment->getTimestamp();

        $sqlCheckQuery = "SELECT name FROM form WHERE name = '$name' AND email = '$email' AND tel = '$tel' AND time > ('$momentUnix' - '86400') AND time < '$momentUnix'";
        $check         = $connection->prepare($sqlCheckQuery);
        $check->execute([$name]);
        $condition = $check->fetchColumn();
        if (gettype($condition) === "string") { // наличие записи с введенным email полученной в течение 24 ч до текущего момента
            exit("order exist");
        } else
            $moment = new DateTime();
        $momentUnix = $moment->getTimestamp();
        $sql_insert = "INSERT INTO form(name, time, tel, email) VALUES ('$name', '$momentUnix', '$tel', '$email')";
        $insert = $connection->prepare($sql_insert);
        $insert->execute([$name, $momentUnix, $tel, $email]);
//        $connection->query($sql_insert);
//            mail('jrrtolkin@mail.ru', 'form', "dgdsgdsg");
    }} catch (PDOException $e) {
//        $message = "$e" + "Время инцидента" + "$moment->format('d/m/Y\ H:i:s.u')"; // Здесь ошибка тестить
////        mail('jrrtolkin@mail.ru', 'DB "test" problem', "$message"); // admin alert
    exit("DB_Exception");
}
