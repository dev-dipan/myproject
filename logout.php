	<?php
	session_start();
	session_destroy();
	unset($_SESSION['id']); //destroy the session
    //session_unset();
    header("location:index.php?logout=1"); //to redirect back to "index.php" after logging out
    /*exit();*/
    ?>