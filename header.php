
<?php
//session_start();
require_once 'inc/sql/function_sql.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="js/my_script.js"></script>
        <link rel="stylesheet" href="css/my_css.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    </head>

    <body data-spy="scroll" data-target=".navbar"> 

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

            <!-- Brand -->

            <a class="navbar-brand" href="#">
                <img src="" alt="Logo" style="width:80px;">
            </a>
            <!-- serch -->


            <div class=" input-group mb-3" style=width:550px;">
                <?php 
               
       $category = new Category_read();            
       $category = $category->All_categorey ();
    
                include 'html/search_form.html.php'; ?>   
            </div>


            <!-- login -->

            <ul class=" navbar-right" style="padding-left:100px" > 
                <div>  <form  method ="POST" action ="login.php" >  
                        <?php
                        if (isset($_SESSION["user_name"])) {
                            ?>
                            <a href ="setting.php"> <h1>Hallo<?= $_SESSION['user_name'] ?></h1></a>
                            <input type="submit" class="btn btn-primary"  name="sinout" value="Sinout" >
                            <?php
                        } else {
                            if (isset($message_fals))
                                echo 'p' . $message_fals;
                            ?>
                            <center> 
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name ="pass"><br>
                                <input type="submit" class="btn btn-primary" style="padding-left:10px " name="login" value="Login" >
                                <label for="login_set" style="color : #007bff;">Login bleiben</label><input type="checkbox"    id="login_set"  name ="login_set"><br>
                                </form>  
                                <a href="">Password vergessen?</a><br>
                                <a href="register.php">Neuer Kunde? Starten Sie hier.</a>
                            <?php } ?>
                            </div>
                            </ul>

                            <!-- Warenkorb -->

                            <ul class="navbar-right" style="padding-left:100px">

                                <a class="navbar-brand" class="notification" href="shope_1.php" >
                                    <span class="glyphicon glyphicon-shopping-cart"></span>

                                    <span>Warenkorb</span></a> <ul>
                                    </nav>



