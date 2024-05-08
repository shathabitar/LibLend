<?php
   
        $Genre=$_GET['genre'];
        require 'connect.php';
        $sql = 'SELECT * FROM Books WHERE Genre = :Genre';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':Genre', $Genre, PDO::PARAM_STR);
        $statement->execute();

        $data= $statement->fetchAll();
        $sql1 = 'SELECT Name FROM Authors';
        $statement1 = $pdo->prepare($sql1);
        $statement1->execute();
        $authors= $statement1->fetchAll();

        $sql2 = 'SELECT Name FROM Publishers';
        $statement2 = $pdo->prepare($sql2);
        $statement2->execute();
        $publishers= $statement2->fetchAll();
        

        if (isset($_GET['submit'])) {
            $sql3 = 'SELECT * FROM Books WHERE Genre = :Genre';
            $Author = $_GET['author'];
            $Publisher = $_GET['publisher'];
            $Genre=$_GET['genre'];

            if ($Author) {
                $sql3 .= ' AND Author = :Author';
            }
            if ($Publisher) {
                $sql3 .= ' AND Publisher = :Publisher';
            }
            
            $statement3 = $pdo->prepare($sql3);
            $statement3->bindParam(':Genre', $Genre, PDO::PARAM_STR);

            if ($Author) {
                $statement3->bindParam(':Author', $Author, PDO::PARAM_STR);
            }
            if ($Publisher) {
                $statement3->bindParam(':Publisher', $Publisher, PDO::PARAM_STR);
            }
        
            $statement3->execute();
            $data = $statement3->fetchAll();
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
        <div class="filterdropdown">
            <form method="GET">
                <select name="author">
                    <option value="" disabled selected hidden>Select an author</option>
                    <?php foreach ($authors as $author){
                     echo '<option value="'. $author['Name'].'">'. $author['Name'].' </option>';
                      }?>
                </select>
                <select name="publisher">
                    <option value="" disabled selected hidden>Select a publisher</option>
                    <?php foreach ($publishers as $publisher){
                     echo '<option value="'. $publisher['Name'].'">'. $publisher['Name'].' </option>';
                      }?>
                </select>
                <input type="hidden" name="genre" value="<?php echo $Genre; ?>">
            <input type="submit" name="submit" value="Submit">
            </form>
        </div>
        <div>
            <div >
            <?php
                echo' <h1>'.$Genre.'</h1>
                <div class="mybookrow" id="genrebook">';
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
                        echo '<h3 style="color:red;"> No Books Found </h3>';
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