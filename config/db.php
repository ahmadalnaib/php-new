
<?php


#PDO

$host='localhost';
$user='root';
$password='';
$dbname="app";


$dsn='mysql:host=' . $host . ';dbname='.$dbname;

$pdo=new PDO($dsn,$user,$password);

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);