<?php
$host = 'localhost:3307';
$db   = 'winkel';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try 
{
     $pdo = new PDO($dsn, $user, $pass, $options);
} 
catch (\PDOException $e) 
{
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

//"Hoe je alles selecteert in een query zonder variabele"
$stmt = $pdo->query("SELECT * FROM winkel");
while ($row = $stmt->fetch()) {
    echo $row['product_naam']."<br />\n";
    echo $row['prijs_per_stuk']."<br />\n";
    echo $row['omschrijving']."<br />\n";
}

//"Hoe je een single row selecteert met placeholders"

$stmt = $pdo->query("SELECT * FROM winkel WHERE product_code = 1");
$user = $stmt->fetch();
while ($row = $stmt->fetch()) {
    echo $row['product_code']."<br />\n";
}

//"Hoe je een single row selecteert met named parameters"
$stmt = $pdo->query("SELECT * FROM winkel WHERE product_code = 2");
$user = $stmt->fetch();
while ($row = $stmt->fetch()) {
    echo $row['product_code']."<br />\n";
}

?>

