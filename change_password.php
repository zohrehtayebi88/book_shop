<?php

declare (strict_types=1);
require_once 'inc/tools.inc.php';
if (!isset($_SESSION["user_id"]))
    header('location:index.php');

class Change_password extends Page {

    private UserDao $userDao;
    private ?User $user;
    private DbConnection $connection;
    private string $newpass;
    private string $oldpass;
    private string $message = '<center><h1>keine richtige password </h1></center>';

    protected function viewNavigation(): void {
        include 'html/setting_category.html.php';
    }

    protected function viewContent(): void {


        $user = new User();
        $this->userDao = new UserDao();
        $this->user = $this->userDao->readOne(intval($_SESSION["user_id"]));
        if ($_POST) {
            if ($_POST["newpass"] == $_POST["newpassb"]) {
                if (password_verify($_POST['oldpass'], $this->user->getPass())) {
                    $this->save();
                    unset($_SESSION["user_name"]);
                    unset($_SESSION["user_id"]);
                    header('location:index.php');
                } else {
                    echo $this->message;
                }
            } else {
                echo 'ngp';
            }
        } else {
            include 'html/change_password.html.php';
        }
    }

    private function save() {
        $password = password_hash($_POST['newpass'], PASSWORD_DEFAULT);
        $this->user->setPass($password);
        $this->userDao->update($this->user);
    }

}

(new Change_password())->view();
?>




