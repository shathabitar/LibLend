

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="library, book, books, borrowing, library near me, lending club login, lending, book lending">
    <meta name="description" content="Discover a world of literature at LibLend. Explore diverse book genres, from Classics to Science Fiction. Borrow trending and new arrival books seamlessly. Welcome to this diverse lending platform at LibLend">
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
        session_start();
        require 'connect.php';

        if (isset($_SESSION["LogIn"])) {

            $Email = $_SESSION['LogIn'];

            $sql1 = "SELECT M_ID FROM Members WHERE Email = :email";
            $statement1 = $pdo->prepare($sql1);
            $statement1->bindParam(':email', $Email, PDO::PARAM_STR);
            $statement1->execute();
            $data1 = $statement1->fetchAll();

            $M_ID = '';
            $bookAlert = '';

            if ($data1) {
                $M_ID = $data1[0]['M_ID'];
                $sql2 = 'SELECT * FROM Transactions WHERE M_ID= :M_ID';
                $statement2 = $pdo->prepare($sql2);
                $statement2->bindParam(':M_ID', $M_ID, PDO::PARAM_INT);
                $statement2->execute();
                $data2 = $statement2->fetchAll();

                foreach ($data2 as $transaction) {
                    $Rdate = new DateTime($transaction['Return_date']);
                    $today = new DateTime('now midnight');

                    $daysRemaining = $today->diff($Rdate)-> days;

                    $ISBN= $transaction['ISBN'];
                    $sql4='SELECT Title FROM Books WHERE ISBN=:ISBN';
                    $statement4 = $pdo->prepare($sql4);
                    $statement4->bindParam(':ISBN', $ISBN, PDO::PARAM_INT);
                    $statement4->execute();
                    $Title = $statement4->fetchColumn();

                    if ($daysRemaining <= 3 && $daysRemaining>0){
                        $bookAlert .= '<p class="notification">Book: ' . $Title . ' | Days Remaining Till Due Date: ' . $daysRemaining . '</p>';
                    }
                }
                if ($bookAlert) {
                    echo '<div id="customAlert"> <p class="alertlogo">&#9940</p> <div class="alertcontent"> <p class="alert">Alert </p> <div class="alertp">' . $bookAlert . ' </div> </div> </div>';
                }
            }
        }
    ?>

    <div id="genrebar">
    <h1>Genres</h1>
        <div class="genres">
        <?php

            $sql='SELECT * FROM Genres';
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $data = $statement->fetchAll();
            foreach ($data as $row) {
                echo '<div class="genre">
                <a href="genre.php?genre='.$row['Name'].'"><img src="resources/images/'.$row['Name'].'.jpg" alt="genre image"></a>
                <label>'.$row['Name'].'</label>
                </div>';
            }
        
        ?>
        
        </div>
    </div>

    <div class="books">
        <h1>Trending</h1>
    <div id="carouselExample" class="carousel slide ">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="bookrow ">
            <?php
                $sql='SELECT * FROM Books ORDER BY No_of_copies LIMIT 5';
                $statement = $pdo->prepare($sql);
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
          <div class="carousel-item">
            <div class="bookrow">
            <?php
                $sql='SELECT * FROM Books ORDER BY No_of_copies LIMIT 5 OFFSET 5';
                $statement = $pdo->prepare($sql);
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
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      </div>

    <div class="books" id="newarrivals">
        <h1>New Arrivals</h1>
        <div class="bookrow">
        <?php
                $sql='SELECT * FROM Books ORDER BY Date DESC LIMIT 5';
                $statement = $pdo->prepare($sql);
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
    
   

    <footer class="footer"> 
        <?php
        include 'footer.php'
        ?>
    </footer>

    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="script/script.js"></script>

<script src="resources/images/Children.jpg"></script>
</html>