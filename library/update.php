<?php
require 'connect.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $NoCopies= $_POST['No_of_copies'];
    $ISBN= $_POST['ISBN'];

    if ($quantity <= $NoCopies){
        $sql = "UPDATE Transactions SET Quantity = :quantity WHERE T_ID = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $data = $statement->execute();


        $sql1 = "UPDATE Books SET No_of_copies = No_of_copies - :quantity WHERE ISBN = :isbn";
        $statement1 = $pdo->prepare($sql1);
        $NoCopies-=$quantity;
        $statement1->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $statement1->bindParam(':isbn', $ISBN, PDO::PARAM_INT);
        $data1 = $statement1->execute();


        if ($data) {
            header('Location: mybooks.php');
        }
        }else{
            header('Location: mybooks.php?error');
        }
}


?>