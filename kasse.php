<?php

declare (strict_types=1);
require_once 'inc/tools.inc.php';
if (!isset($_SESSION["user_id"]))
    header('location:index.php');

class Kasse extends Page {

    protected function viewNavigation(): void {
        
    }

    protected function viewContent(): void {
        $productDao = new ProductDao;
        $this->shopDao = new ShopDao();
        $this->shop = new Shop;

        $exp_datum = date("Y-m-d H:i:s", strtotime("+3month"));

        if (isset($_SESSION["anzahl"]) && count($_SESSION["anzahl"]) > 0 && isset($_POST)) {

            $shop = $this->shopDao->readmaxId();
            $shop += 1;
            $exp_datum = date("Y-m-d H:i:s", strtotime("+3month"));
            foreach ($_SESSION["anzahl"] as $id => $value) {
                $product = $productDao->readOne($id);
                $name = $product->getName();
                $product->getDiscount() ? $preis = $product->getDiscount_preis() : $preis = $product->getPreis();
                $this->shop->setShop_n($shop);
                $this->shop->setProduct_id(intval($id));
                $this->shop->setProduct_name($name);
                $this->shop->setProduct_preis($preis);
                $this->shop->setQuantity($value);
                $this->shop->setExp_datum($exp_datum);
                $this->shop->setUser_id(strval($_SESSION['user_id']));
                $this->shopDao->create($this->shop);
                $_SESSION['shop_n'] = $shop;
                unset($_SESSION["anzahl"]);
            }
        }
        //TODO header('Location:index.php')  ;   
    }

}

(new Kasse())->view();
?>
 
