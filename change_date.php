<?php

declare (strict_types=1);
require_once 'inc/tools.inc.php';
if(!isset($_SESSION["user_id"]))    header('location:index.php');

class Setting extends Page {

    private UserDao $userDao;
    private ?User $user;
    private ?ShopDao $shop;
    private string $message1 = '<center><h1>Ihre daten wurde erfolgreich geändert.</h1></center>';
    private string $message2 = '<center><h1>keine richtige pass word oder Captcha.  </h1></center>';
    private DbConnection $connection;

    protected function viewNavigation(): void {
        include 'html/setting_category.html.php';
    }

    protected function viewContent(): void {
        $id = $_SESSION["user_id"];
        $this->shop = new ShopDao();
        $this->userDao = new UserDao();
        $this->user = $this->userDao->readOne(intval($id));
        $user = $this->user;

        if (isset($_POST['speischen'])) {
            $pass = $_POST["passa"];
            $eingabe = $_POST["eingabe"];
            if (password_verify($pass, $user->getPass()) && password_verify($eingabe, $_SESSION['captcha'])) {
                $this->save();
                $this->user = $this->userDao->readOne(intval($id));
                $user = $this->user;
                $_SESSION['user_name'] = '';
                $_SESSION['user_name'] = $user->getN_name();
                echo $this->message1;
                //TODO send email
            } else {
                echo $this->message2;
            }
        }
    }

    private function save() {
        //$password = password_hash($_POST['pass'],PASSWORD_DEFAULT);
        $this->user->setName(htmlSpecialChars($_POST['name']));
        $this->user->setN_name(htmlSpecialChars($_POST['n_name']));
        $this->user->setEmail(htmlSpecialChars($_POST['email']));
        $this->user->setAnrede(htmlSpecialChars($_POST['anrede']));
        $this->user->setLand(htmlSpecialChars($_POST['land']));
        $this->user->setPlz(htmlSpecialChars($_POST['plz']));
        $this->user->setStrasse(htmlSpecialChars($_POST['strasse']));
        $this->userDao->update($this->user);
    }

}

(new Setting())->view();
?>