<?php


$error='';

if (isset($_POST['submit'])) { 
    require 'connect.php';
    $sql = "SELECT * FROM Members WHERE Email =:Email AND Password =:Password";

    $Email = $_POST["email"];
    $Password = $_POST["password"];

    $statement = $pdo->prepare($sql);

    $statement->bindParam(':Email', $Email, PDO::PARAM_STR); 
    $statement->bindParam(':Password', $Password, PDO::PARAM_STR);

    $statement->execute();

    $data = $statement->fetchAll();


    if ($data != null) { 
        session_start();
        $_SESSION['LogIn'] = $Email;
        $_SESSION['Password'] = $Password;
        header("Location: index.php?");
    } else {
        $error = 'Invalid Login';
    }

    $pdo = null;
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="library,login, book, books, borrowing, library near me, lending club login, lending, book lending">
    <meta name="description" content="Discover a world of literature at LibLend. Explore diverse book genres, from Classics to Science Fiction. Borrow trending and new arrival books seamlessly. Welcome to a literary adventure at LibLend">
    <title>LibLend</title>
    <link rel="icon" type="image/png" href="resources/images/logo.png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/library.css">
    <script src="https://kit.fontawesome.com/6e46cd05d0.js" crossorigin="anonymous"></script>

</head>
<body class="registerpage">
    <header>
        <?php
        require 'header.php';
        ?>
    </header>


    <div class="logindiv">
        <h1>Login</h1>
        <?php
            if (!empty($error)) {
                echo '<p style="background-color: rgb(255, 0, 0, 0.6); padding: 10px; margin-top: 10px; width:400px;">' . $error . ' </p>';
            }
        ?>
        <form class="form" method="post">
            <div class="form" >
                <i class="fa-regular fa-envelope fa-2xl"></i>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="example@example.com" class="input">
            </div>
            <div class="form">
                <i class="fa-solid fa-lock fa-2xl"></i>
                <label for="pass">Password</label>
                <input id="pass" name="password" type="password" placeholder="********" class="input">
            </div> <br>
            <div class="loginoptions">
                <a href="signup.php" class="signuplink">Don't have an account?</a>
            </div>
            <input type="submit" name="submit" value="Log in" id="logininput" class="submit">
        </form>
    </div>

    <footer>
        <?php
        include 'footer.php'
        ?>
    </footer>
    
</body>
<script src="script/script.js"></script>
</html>