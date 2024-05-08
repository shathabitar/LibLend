<?php

require 'connect.php';
if (isset($_GET['submit'])) {
$query=$_GET['search'];
$sql = "SELECT * FROM Books WHERE Title LIKE '%" . $query . "%' or Author LIKE '%" . $query . "%' or Publisher LIKE '%" . $query . "%'";
$statement=$pdo->prepare($sql);

$statement->execute();
$data=$statement->fetchAll();
$rowCount = $statement->rowCount();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="library, genre, genres of books, genre of books, book, books, book lending">
    <meta name="description" content="Explore diverse book genres, from Classics to Science Fiction.">
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

    <div class="genrepagediv">
        
                <h6 class="count"><?php echo $rowCount;?> results found</h6>
           
       
            <div >
            <?php
            echo '<div class="mybookrow" id="genrebook">';
                if ($data) {
                    foreach ($data as $row) {
                        echo '<div class="mybookrow">
                            <div class="book mybook genremybook">
                            <a href="book.php?id='.$row['ISBN'].'"><img src="'.$row['Picture_path'].'" alt="Book Image" class="bookimg"> </a>
                                <label> ' . $row['Title'] . ' </label> 
                                <h5 class="BookAdded">Book Added</h5>
                        <button class="borrowbtn" isbn="' . $row['ISBN'] . '">Borrow</button>
                            </div>
                        </div>';
                        }
                    }
                else{
                        echo '<h3 style="color:red;"> No results Found </h3>';
                    }
                
            ?>
                
                 </div>
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