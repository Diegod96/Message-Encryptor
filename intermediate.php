

<?php

    session_start();

    $_SESSION['msg'] = $_POST['msg'];
    $_SESSION['algo'] = $_POST['algo'];

    if ($_SESSION['algo'] == 'VIG') {
        include ("forms_2.php");
    }else{
       include("encrypt_data.php");
    }

?>
