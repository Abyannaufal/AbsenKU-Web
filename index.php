<?php
session_start();

if (isset( $_SESSION['nim'])) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
}
else if (isset($_SESSION['nidn']))
{

} 
else {
    // Redirect them to the login page
    header("Location:login.html");
}

if(isset($_POST['logout'])){
    session_destroy();
}
?>
<html>
    SELAMAT KAMU BERHASIL LOGIN
    <form method ="POST" action="">
        <input type = submit value ="LOGOUT" name = "logout">
    </form>
</html>