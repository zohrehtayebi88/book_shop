<?php
declare (strict_types=1);
require_once 'inc/tools.inc.php';

class One_Product extends Page
{
    private ProductDao         $productDao;
    private ?Product           $product;
    private string             $message ="<center><h1>Diese  Artikel gibt es nicht mehr </h1></center>";

    protected function viewNavigation() : void
        {  
            include 'html/nav_category.html.php';        
        }
    protected function viewContent() : void
        {
            $id                     = $_GET["ref"];
            $this->productDao       = new ProductDao();   
            $one_product              = $this->productDao-> readOne(intval($id));
  
  
                $one_product??'';
                if($one_product== '')
                    {  
                     echo $this->message; // TODO  $try-cach;
                  
                    }else{ 
                        $product  = $one_product;
          
                        if(isset($_POST["q$id"]))
                            {
                            $_SESSION["anzahl"][$id] = $_POST["anzahl$id"];
                            }
                        include 'html/one_product_form_1.html.php';       
                        
                        }
        
}}

(new One_Product())->view();
?>
 