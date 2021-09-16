<?php

declare (strict_types=1);
require_once 'inc/tools.inc.php';

class Products extends Page {

    private ProductDao $productDao;
    private ?Product $product;


    protected function viewNavigation(): void {
        include 'html/nav_category.html.php';
    }

    protected function viewContent(): void {
        $category = $_GET["cate"];
        $this->productDao = new ProductDao();
        $product = new Product();
        $products = $this->productDao->read_Pro_cat($category);
        $products ?? '';
        if (count($products) == 0) {
            echo 'falsh'; // TODO  $message;
        } else {
            include 'html/products_form_1.html.php';
        }
    }

}

(new Products())->view();
?>
 
