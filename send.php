<?php
$dsn = "mysql:host=localhost;dbname=test;charset=utf8";
$dbuser = "root";
$dbpass = "mysql";
$arr = []; //?
try {
    $connection = new PDO($dsn, $dbuser, $dbpass);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['name'])) {
        // Добавить в асоц массив
        // применить к каждомк элементу массива ф-ую {strip_tags, htmlentities}
        $name = strip_tags($_POST['name']);
        $name = htmlentities($_POST['name']);
        $moment = new DateTime();
        $momentUnix = $moment->getTimestamp();

        $sqlCheckQuery = "SELECT name FROM form WHERE name = '$name' AND time > ('$momentUnix' - '86400') AND time < '$momentUnix'";
        $check         = $connection->prepare($sqlCheckQuery);
        $check->execute([$name]);
        $condition = $check->fetchColumn();
        if (gettype($condition) === "string") { // наличие запсис
            exit("order exist");
        } else
//            setcookie('name', $name);
            $moment = new DateTime();
            $momentUnix = $moment->getTimestamp();
            $sql_insert = "INSERT INTO form(name, time) VALUES ('$name', '$momentUnix')";
            $connection->query($sql_insert);
            mail('jrrtolkin@mail.ru', 'form', "dgdsgdsg");
    }} catch (PDOException $e) {
//        $message = "$e" + "Время инцидента" + "$moment->format('d/m/Y\ H:i:s.u')"; // Здесь ошибка тестить
////        mail('jrrtolkin@mail.ru', 'DB "test" problem', "$message"); // admin alert
        exit("DB_Exception");
}


































//$sqlCreate = 'create table form
//(
//    id int auto_increment,
//	name text not null,
//	time timestamp null,
//	constraint form_pk
//		primary key (id)
//)';

