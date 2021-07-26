<?php

require_once "core/init.php";

if( !isset($_SESSION['user']) ){
    header('Location: login.php');
}

?>

<h1>Hallo <?php echo $_SESSION['user'] ?> </h1>
<a href="logout.php">logout</a>