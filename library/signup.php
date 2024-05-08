<?php
$error='';
if(isset($_POST['insert'])){
    require 'connect.php';

    $sql1 = "SELECT * FROM Members WHERE Email =:Email";
    $Email = $_POST["email"];
    $statement1 = $pdo->prepare($sql1);
    $statement1->bindParam(':Email', $Email, PDO::PARAM_STR); 

    $statement1->execute();
    $data = $statement1->fetchAll();

    if ($data != null) { 
        $error = 'This user already exists';
    }
    else{

        $sql2="insert into Members(Fname,Lname,Email,Password,Phone) values (:Fname, :Lname,:Email,:Password,:Phone)";
        $statement=$pdo->prepare($sql2);

        $Fname=$_POST['fname'];
        $Lname=$_POST['lname'];
        $Email=$_POST['email'];
        $Password=$_POST['password'];
        $Phone=$_POST['phno'];

        $statement->bindParam(':Fname', $Fname, PDO::PARAM_STR);
        $statement->bindParam(':Lname', $Lname, PDO::PARAM_STR);
        $statement->bindParam(':Email', $Email, PDO::PARAM_STR);
        $statement->bindParam(':Password', $Password, PDO::PARAM_STR);
        $statement->bindParam(':Phone', $Phone, PDO::PARAM_INT);

        $statement->execute();  
        $pdo=null;
        header('Location: login.php');
    }
}
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
<body class="registerpage">
    <header>
        <?php
        require 'header.php';
        ?>
    </header>

    <div class="signupdiv">
        <h1>Welcome to LibLend</h1>
        <?php
            if (!empty($error)) {
                echo '<p style="background-color: rgb(255, 0, 0, 0.6); padding: 10px; margin-top: 10px; width:400px;">' . $error . ' </p>';
            }
        ?>
        <form method="post">
            <div class="form">
                <i class="fa-solid fa-circle-user fa-2xl"></i>
                <label for="fname"><label class="required">*</label>First Name</label>
                <input id="fname" name="fname" type="text" maxlength="20" placeholder="Your First Name" class="input" required>
            </div>
            <div class="form">
                <i class="fa-solid fa-circle-user fa-2xl"></i>
                <label for="lname"><label class="required">*</label>Last Name</label>
                <input id="lname" name="lname" type="text" maxlength="20" placeholder="Your Last Name" class="input" required>
            </div>
            <div class="form">
                <i class="fa-regular fa-envelope fa-2xl"></i>
                <label for="email"><label class="required">*</label>Email</label>
                <input type="email" name="email" id="email" maxlength="30" placeholder="example@example.com" class="input" required>
            </div>
            <div class="form">
                <i class="fa-solid fa-phone fa-2xl"></i>
                <label for="phno"><label class="required">*</label>Phone Number</label>
                <input id="phno" name="phno" type="text" maxlength="10" placeholder="07********" class="input" required>
            </div>
            <div class="form">
                <i class="fa-solid fa-lock fa-2xl"></i>
                <label for="pass"><label class="required">*</label>Password</label>
                <input id="pass" name="password" type="password" maxlength="30" placeholder="********" class="input" required>
            </div>
    
            <input type="submit" name="insert" value="Create Account" class="submit" id="signupinput">
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