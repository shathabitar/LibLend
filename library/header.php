<?php

session_start();
echo '
<a href="index.php"><img src="resources/images/Artboard 1.png" alt="Liblend logo" class="logo"></a>'.
'<nav id="mainnav">
    <div class="dropdown">
        <button id="genrebtn">Genre</button>
        <div class="genre-options">
          <a href="genre.php?genre=Classics">Classics</a>
          <a href="genre.php?genre=Mystery">Mystery</a>
          <a href="genre.php?genre=Horror">Horror</a>
          <a href="genre.php?genre=Thriller">Thriller</a>
          <a href="genre.php?genre=Science">Science</a>
          <a href="genre.php?genre=Science Fiction">Science Fiction</a>
          <a href="genre.php?genre=Children">Children</a>
          <a href="genre.php?genre=Fantasy">Fantasy</a>
        </div>
      </div>
    <div class="search">
        <form action="search.php" method="GET">
            <input type="text" placeholder="Search" name="search">
            <button type="submit" name="submit"><img src="resources/icons/magnifying-glass-solid.svg" alt="magnifying glass search icon"></button>
          </form>
    </div>
    <div class="registerdiv">
      <a href="signup.php"><button id="signupbtn" class="register">Sign up</button></a>';

    if (!isset($_SESSION['LogIn'])) {
     echo '<a href="login.php"><button id="loginbtn" class="register">Login</button></a> </div>';
    }else{
      echo '<a href="logout.php"><button id="loginbtn" class="register">Logout</button></a> </div>';
    }

    if (isset($_SESSION['LogIn'])) {
      echo '<div>
                <a href="mybooks.php"><img src="resources/icons/book-open-solid.svg" class="fa-book-open" alt="open book icon"></a>
            </div>';
  }
  
  echo '</nav>';


    
  

?>