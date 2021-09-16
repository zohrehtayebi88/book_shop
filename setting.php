<?php

declare (strict_types=1);
require_once 'inc/tools.inc.php';
if(!isset($_SESSION["user_id"]))    header('location:index.php');

class Setting extends Page {

    private UserDao $userDao;
    private ?User $user;
    private ?ShopDao $shop;
    private string $message1 = '<center><h1>keine richtige pass word oder code </h1></center>';
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
        $value = new Captcha();
        $value = $value->create_captcha();
        $action = $_GET['action'] ?? '';

        switch ($action) {
            case 'up':

                $value = new Captcha();
                $_SESSION['captcha'] = $value->create_captcha();
                include 'html/change_date_form.html.php';
                break;

            case 'pass':
                include 'html/change_password_form.html.php';
                break;

            case 're':
                header('location:all_shope.php');
                break;

            case 'del':
                if (isset($_POST['delet'])) {
                    $pass = $_POST["passa"];
                    if (password_verify($pass, $user->getPass())) {
                        $this->delete();
                        session_destroy();
                        $_SESSION = [];
                        $_SESSION["user_name"] = '';
                        $_SESSION["user_id"] = '';
                    }
                } else {
                    include 'html/acount_delete.html.php';
                }
                break;
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

    private function delete() {
        $this->userDao->delete($this->user);
    }

}

(new Setting())->view();
?>
