<?php

declare (strict_types=1);
require_once 'inc/tools.inc.php';
if(isset($_POST['login']))
    {
    try {
        
 
    $_SESSION['control']??0;
            if ($_SESSION["control"]<3)
            {  $login = new Login($_POST["email"] ?? '', $_POST["pass"] ?? '' ,$_POST['login_set']??'0');
                    $login = $login->check();
        $_SESSION["control"]++;
           }
          else{ sleep(10);
          $_SESSION["control"]=0;
                 }
        } catch (Exception $ex) {
       echo '<h1 >Falshe Password oder Email</h1>';
    }
    }elseif ($_POST["sinout"]) {
    session_destroy();
$_SESSION = [];
unset($_SESSION["user_name"]);
unset($_SESSION["user_id"]);
}

header('location:index.php');

  
?>