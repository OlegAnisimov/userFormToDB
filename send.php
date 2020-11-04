<?php
echo "hello";
$dsn = "mysql:host=localhost;dbname=test;charset=utf8";
$dbuser = "root";
$dbpass = "mysql";

$connection = new PDO($dsn, $dbuser, $dbpass);
$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

if (isset($_POST['name'])) {
    $name = strip_tags($_POST['name']);
    $name = htmlentities($_POST['name']);
    $sql = "INSERT INTO form(name) VALUES ('$name')";
    $connection->query($sql);
} else {
    echo
    <<<INFO
        <div class="info">Заполнить поле Имя</div>
INFO;

}



























//$sqlCreate = 'create table form
//(
//    id int auto_increment,
//	name text not null,
//	time timestamp null,
//	constraint form_pk
//		primary key (id)
//)';

