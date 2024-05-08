<?php

require 'connect.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $quantity = $_GET['quantity'];
    $ISBN = $_GET['isbn'];

    $sql1 = "UPDATE Books SET No_of_copies = No_of_copies + :quantity WHERE ISBN = :isbn";
    $statement1 = $pdo->prepare($sql1);
    $statement1->bindParam(':quantity', $quantity, PDO::PARAM_INT);
    $statement1->bindParam(':isbn', $ISBN, PDO::PARAM_INT);
    $data1 = $statement1->execute();


    $sql = "DELETE FROM Transactions WHERE T_ID = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":id", $id, PDO::PARAM_INT);
    $data = $statement->execute();

    if ($data1 && $data) {
        header('Location: mybooks.php');
    } else {
        header('Location: mybooks.php?error');
    }
}


?>