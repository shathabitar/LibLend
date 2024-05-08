<?php

session_start(); 
if (isset($_SESSION["LogIn"]) ){

require 'connect.php';

$Email = $_SESSION['LogIn'];

$sql1 = "SELECT M_ID FROM Members WHERE Email = :email";
$statement1 = $pdo->prepare($sql1);
$statement1->bindParam(':email', $Email, PDO::PARAM_STR);
$statement1->execute();
$data1 = $statement1->fetchAll();

$M_ID = '';
if ($data1) {
    $M_ID = $data1[0]['M_ID'];
}

$ISBN = $_GET['id'];

$sql2='SELECT * FROM Transactions WHERE M_ID= :M_ID AND ISBN= :ISBN';
$statement2 = $pdo->prepare($sql2);
$statement2->bindParam(':ISBN', $ISBN, PDO::PARAM_INT);
$statement2->bindParam(':M_ID', $M_ID, PDO::PARAM_INT);
$statement2->execute();
$data2 = $statement2->fetchAll();
if ($data2) {
    header('Location: mybooks.php');
}
else{

    $sql = 'INSERT INTO Transactions(Lease_date, Return_date, M_ID, ISBN) VALUES(:Ldate, :Rdate, :M_ID, :ISBN)';

    $Ldate1 = new DateTime(); 
    $Ldate = $Ldate1->format('Y-m-d'); 
    $Rdate = date("Y-m-d", strtotime($Ldate . " +7 days")); 

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':ISBN', $ISBN, PDO::PARAM_INT);
    $statement->bindParam(':Ldate', $Ldate, PDO::PARAM_STR);
    $statement->bindParam(':Rdate', $Rdate, PDO::PARAM_STR); 
    $statement->bindParam(':M_ID', $M_ID, PDO::PARAM_INT);
    $statement->execute();

    header('Location: mybooks.php');
}
}
else{
    header('Location: login.php');
}
?>