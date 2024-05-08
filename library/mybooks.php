
<?php
session_start();
if(!isset($_SESSION['LogIn'])){
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="library,mybooks, book, books, borrowing, library near me, lending club login, lending, book lending">
    <meta name="description" content="Discover a world of literature at LibLend. Explore diverse book genres, from Classics to Science Fiction. Borrow trending and new arrival books seamlessly. Welcome to a literary adventure at LibLend">
    <title>LibLend</title>
    <link rel="icon" type="image/png" href="resources/images/logo.png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/library.css">
    <script src="https://kit.fontawesome.com/6e46cd05d0.js" crossorigin="anonymous"></script>

</head>
<body>
    <header>
        <?php
        require 'header.php';
        ?>
    </header>

    <div class="mybooksdiv">
        <h1>My Books</h1>
    <h2 id="h2current">Currently Reading</h2>
        <div class="currentbook">
        <?php
            require 'connect.php';
            $Email = $_SESSION['LogIn'];
            $sql = 'SELECT t.T_ID, t.Lease_date, t.Return_date, m.Email, b.Title, b.No_of_copies, b.Picture_path, b.ISBN, t.Quantity
                    FROM Transactions t
                    JOIN Members m ON t.M_ID = m.M_ID
                    JOIN Books b ON b.ISBN = t.ISBN 
                    WHERE m.Email = :Email';

            $statement = $pdo->prepare($sql);
            $statement->bindParam(':Email', $Email, PDO::PARAM_STR);
            $statement->execute();
            $data = $statement->fetchAll();
            $total_fees=0;
            if($data) {
            

                foreach ($data as $row) {
                    $Due_Date = date("Y-m-d", strtotime($row['Lease_date'] . " +7 days"));
                    $dueDate = new DateTime($Due_Date);
                    $returnDate = new DateTime($row['Return_date']);
                    $dateDifference = $dueDate->diff($returnDate);
                    if($dateDifference > 0) {
                        $latefees = $dateDifference->days * 0.5;
                        $total_fees += $latefees;
                    }

                    $TodaysDate = new DateTime();

                    if ($returnDate > $TodaysDate){

                    echo '<div class="mybookrow mybookrow1">
                            <div class="book mybook">
                                <a href="book.php?id='.$row['ISBN'].'"><img src="'.$row['Picture_path'].'" alt="Book Image" class="mybookimg"> </a>
                                <label for="">' . $row['Title'] . '</label> 
                            </div>
                            
                            <div class="mybooklabels">
                            <form action="update.php" method="post">
                                <label class="titlelbl dates"> ' . $row['Title'] . '</label>
                                <label class="dates">Borrow Date: ' . $row['Lease_date'] . '</label>
                                <label class="dates">Due Date: ' . $Due_Date . '</label>
                                
                                <select class="noofbooks" name=quantity>
                                    <option value="" disabled selected hidden>'.$row['Quantity'].'</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <input type="hidden" name="id" value= ' . $row['T_ID'] . '>
                                <input type="hidden" name="ISBN" value= ' . $row['ISBN'] . '>
                                <input type="hidden" name="No_of_copies" value= ' . $row['No_of_copies'] . '>
                                <input type="submit" name="update" value="Update" class="borrowbtn updatebtn"> 
                                </form>';

                                
                                echo '<a href="delete.php?id=' . $row['T_ID'] . '&isbn=' . $row['ISBN'] . '&quantity=' . $row['Quantity'] . '"><img src="resources/icons/trash-can-regular.svg" class="fa-trash"></a>
                            </div>
                        </div>';
                    }
        
                    
                
                }
            }else{
                echo' <h3 style="color:red; margin-top:0px;" > No Books Borrowed</h3>'; 
            }
            
            
            ?>

            
            
            
        </div>
            <?php
            echo '<h3>Late Fees: ' . $total_fees . ' JOD</h3>';
            ?>
    
        
        <h2>My Loans</h2>
        <div class="loanbooks">
            <div class="mybookrow mybookrow1" id="loaned">
               <?php
               if($data){
            
               foreach ($data as $row) {
                $returnDate = new DateTime($row['Return_date']);

                $TodaysDate = new DateTime();

                if ($returnDate < $TodaysDate){

                    echo '<div class="mybookrow mybookrow1" id="loaned">
                        <div class=" book mybook myloaned">
                        <a href="book.php?id='.$row['ISBN'].'"><img src="'.$row['Picture_path'].'" alt="Book Image" class="mybookimg"> </a>
                        <label for="">' . $row['Title'] . '</label>
                        </div>
                        </div>';
                }

                }
            }else{
                echo' <h3 style="color:red; margin-top:0px;" > No Books Borrowed</h3>';
                }
               ?>
            </div>
        </div> 

    </div>

    <footer>
        <?php
        include 'footer.php'
        ?>
    </footer>
</body>
<script src="script/script.js"></script>
</html>