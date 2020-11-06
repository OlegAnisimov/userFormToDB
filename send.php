<?php
$dsn = "mysql:host=localhost;dbname=test;charset=utf8";
$dbuser = "root";
$dbpass = "mysql";
$arr = []; //?
try {
    $connection = new PDO($dsn, $dbuser, $dbpass);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['name'])) {
        $name = strip_tags($_POST['name']);
        $name = htmlentities($_POST['name']);
        $sqlCheckQuery = "SELECT name FROM form WHERE name = '$name'";
        $check         = $connection->prepare($sqlCheckQuery);
        $check->execute([$name]);
        $condition = $check->fetchColumn();
        if (gettype($condition) === "string") { // наличие запсис
            exit("order exist");
        } else
            setcookie('name', $name);
            $sql_insert = "INSERT INTO form(name) VALUES ('$name')";
            $connection->query($sql_insert);
            mail('jrrtolkin@mail.ru', 'form', "dgdsgdsg");
    }} catch (PDOException $e) {
    echo $e->getMessage("BD problems");
}


































//$sqlCreate = 'create table form
//(
//    id int auto_increment,
//	name text not null,
//	time timestamp null,
//	constraint form_pk
//		primary key (id)
//)';

