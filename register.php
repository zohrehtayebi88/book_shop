<?php

declare (strict_types=1);
require_once 'inc/tools.inc.php';
if (isset($_SESSION['user_name']) && isset($_SESSION['user_id'])) {
           header('location:index.php');
        }
class Register extends Page {

    private UserDao $userDao;
    private ?User $user;
    private DbConnection $connection;
    private string $message1 = '<center><h1>Dise E-Mail exsistiert breit!</h1></center>';
    private string $message2 = '<center><h1>keine gleiche pass word oder captca </h1></center>';
    

    protected function viewNavigation(): void {
        include 'html/nav_category.html.php';
          }

    protected function init(): void {
        if (isset($_SESSION['user_name']) && isset($_SESSION['user_id'])) {
            header('Location:index.php');
        }
    }

    protected function viewContent(): void {
        $this->userDao = new UserDao();
        $this->user = new User();
        if (isSet($_POST['anmelden'])) {
            $eingabe = $_POST["eingabe"];
            if (!password_verify($eingabe, $_SESSION['captcha'])) {
                    echo $this->message2;
                }elseif ($this->userDao->readEmail($_POST['email']) != null) {
                    echo $this->message1;
                } elseif ($_POST["pass"] != $_POST["passb"]) {
                    echo $this->message2;
                } elseif ($this->userDao->readEmail($_POST['email']) == null && $_POST["pass"] == $_POST["passb"]) {
                    $this->save();
                    $_SESSION['user_name'] = htmlSpecialChars($_POST['name']);
                    $_SESSION['user_id'] = $this->userDao->connection->lastInsertId();
                   header('location:index.php');
                    //TODO email senden
                }
         
        } else {
            include 'html/register_form.html.php';    
        }
    }

    private function save() {
        $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $this->user->setName(htmlSpecialChars($_POST['name']));
        $this->user->setN_name(htmlSpecialChars($_POST['n_name']));
        $this->user->setEmail(htmlSpecialChars($_POST['email']));
        $this->user->setAnrede(htmlSpecialChars($_POST['anrede']));
        $this->user->setLand(htmlSpecialChars($_POST['land']));
        $this->user->setPass($password);
        $this->user->setPlz(htmlSpecialChars($_POST['plz']));
        $this->user->setStrasse(htmlSpecialChars($_POST['strasse']));
        $this->userDao->create($this->user);
    }

}

(new Register())->view();
?>