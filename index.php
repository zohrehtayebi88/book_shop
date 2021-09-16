<?php

declare (strict_types=1);
require_once 'inc/tools.inc.php';

class FirstPage extends Page {

    private ProductDao $productDao;
    private ?Product $product;
    private string $message1 = '<center><h1>OPSS! </h1></center>';

    protected function viewNavigation(): void {
        include 'html/nav_category.html.php';
    }

    protected function viewContent(): void {
       
        $_GET? $type = $_GET['type'] : $type = '';
        $this->productDao = new ProductDao();
        $product          = new Product();
        switch ($type) {
            case 'fav':
                 break;

            case 'new':
                $limit_datum = date("Y-m-d H:i:s", strtotime("-3month"));
                 $products = $this->productDao->read_Product('letzte_datum',$limit_datum,'>');
                break;

            case 'dis':
                $products = $this->productDao->read_Product('discount','1','=');
                break;
        }
        include 'html/index_table1.html.php';
    }

}

(new FirstPage())->view();
