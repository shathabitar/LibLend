<?php

        $ISBN=$_GET['id'];
        require 'connect.php';
        $sql = 'SELECT * FROM Books WHERE ISBN = :ISBN';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':ISBN', $ISBN, PDO::PARAM_INT);
        $statement->execute();

        $data= $statement->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="registration,signup, create account, sign up, book, books, borrowing, library near me, lending club login, lending, book lending">
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

    <?php
        echo '<div class="entirebookpage">
            <div id="bookpagediv">
                <div class="bookpage">';
        $genre='';
        $bookisbn=0;
        foreach ($data as $row) {
            echo '<img src="'.$row['Picture_path'].'" class="onebookimg" alt="Book Image">
                <div class="bookinfo">
                    <h1 id="titleh1">'.$row['Title'].'</h1>
                    <label>Author:</label>
                    <h4 id="authorh4">'.$row['Author'] .'</h4>
                    <label>Publisher:</label>
                    <h5 id="publisherh5">'.$row['Publisher'].'</h5>
                    <label id="copiesno"> Number of copies available: '.$row['No_of_copies'].'</label>
                    <h5 id="bookinfoadded" class="BookAdded">Book Added</h5>
                    <button class="borrowbtn" id="bookpagebrwbtn" isbn="' . $row['ISBN'] . '">Borrow</button>
                </div>';
                $genre = $row['Genre'];
                $bookisbn= $row['ISBN'];
        }

        echo '</div></div>

        <div class="summarydiv">
            <h2>Summary</h2>
            <p>'.$row['Summary'].'</p>
        </div>
    </div>';
    ?>
    
    <div class="books booksuggestion">
        <h1>People Also Like</h1>
        <div class="bookrow ">
        <?php
                $sql='SELECT * FROM Books WHERE Genre=:genre and ISBN <> :bookisbn LIMIT 5 ';
                $statement = $pdo->prepare($sql);
                $statement->bindParam(':bookisbn', $bookisbn, PDO::PARAM_STR);
                $statement->bindParam(':genre', $genre, PDO::PARAM_STR);
                $statement->execute();
                $data = $statement->fetchAll();
                foreach ($data as $row) {
                    echo '<div class="book">
                    <a href="book.php?id='.$row['ISBN'].'"><img src="'.$row['Picture_path'].'" alt="Book Image" class="bookimg"> </a>
                    <label> ' . $row['Title'] . ' </label> 
                    <h5 class="BookAdded">Book Added</h5>
                    <button class="borrowbtn" isbn="' . $row['ISBN'] . '">Borrow</button>
                    </div>';
                    
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