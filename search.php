
<?php

require_once 'inc/tools.inc.php';

class Search extends Page {

    private ProductDao $productDao;
    private ?Product $product;

    protected function viewNavigation(): void {
    
       }
   

    protected function viewContent(): void {
        
            $wort = $_POST['obj_search'] ?? '';
            $category = $_POST['selectcategory'] ?? '';
            $this->product = new Product();
            $this->productDao = new ProductDao();
            $products = $this->productDao->Search($wort, $category);
            $products ? include 'html/products_form_1.html.php' . $msg = '' : $msg = '<center><h1>Keine ergibnis</h1></center>';
            echo $msg;
        

         
    }

}

(new Search())->view();
?>