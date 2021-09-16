<?php

declare (strict_types=1);
require_once 'inc/tools.inc.php';
if(!isset($_SESSION["user_id"]))    header('location:index.php');

class All_Shope extends Page {

    private UserDao $userDao;
    private ?User $user;
    private ?ShopDao $shopDao;
    private ?Shop $shop;
    private DbConnection $connection;

    protected function viewNavigation(): void {
        include 'html/setting_category.html.php';
    }

    protected function viewContent(): void {
        $id = $_SESSION["user_id"];

        $this->shopDao = new ShopDao();
        $this->shop = new Shop();
        $this->userDao = new UserDao();

        $curent_time = date("Y-m-d");
        $this->user = $this->userDao->readOne(intval($id));
        $user = $this->user;
        $purchasing = $this->shop;

        $purchasing = $this->shopDao->read_Purchasing(intval($_SESSION['user_id']), $curent_time);
        $purchasing ?? '';
        if ($purchasing != '') {
            include 'html/purchasing_form.html.php';
        }
    }

}

(new All_Shope())->view();
?>
