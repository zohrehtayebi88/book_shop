<?php

declare (strict_types=1);
require_once 'inc/tools.inc.php';

class Product_Mng extends Admin_Page {

    private Category $category;

    protected function viewContent(): void {
        $ref = $_GET['ref'];
        $this->product = new Product();
        $this->productDao = new ProductDao();
        $this->category = new Category();
        $this->categoryDao = new CategoryDao();
        $categorys = $this->categoryDao->readAll();
        switch ($ref) {

            case 'ins':

                if (isSet($_POST['save'])) {
                   $this->save();
//               $id = mysqli_insert_id($this->connection);
//               var_dump($id); }         
                 
               
//                if (isset($_FILES['imgfile'])) {
//                    $this->img = new Upload($_FILES['imgfile']['name'], $_FILES['imgfile']['tmp_name'], '22');
//                    $this->img->move();
                }
                include 'html/insert_product_form.html.php';
                break;

            case 'up':

                if (isSet($_POST["delete"])) {
                    $this->product = $this->productDao->readOne(intval($_POST['pro_id']));
                    $this->delete();
                }
                if (isset($_POST["update"])) {  
                    $this->product = $this->productDao->readOne(intval($_POST['pro_id']));                  
                    $this->save(); 
                    
                }
                $products = $this->productDao->readAll();
                include 'html/change_product.html.php';

                break;

            case '':
                break;

            case '':
                break;

            case '':
                break;

            case '':
                break;
        }
    }

    private function save() {
        if (isset($_POST['discount'])) {
            $discount = '1';
        } else {
            $discount = '0';
        }
        if(isset($_FILES['imgfile'])){
            $img = $_FILES['imgfile']['name'];
            $this->img = new Upload($_FILES['imgfile']['name'], $_FILES['imgfile']['tmp_name'],$this->product->getId());
            $this->img->move();
        } else {
            $img =$product->getImg();
        }
        $this->product->setName(htmlSpecialChars($_POST['name']));
        $this->product->setAutor(htmlSpecialChars($_POST['autor']));
        $this->product->setThema(htmlSpecialChars($_POST['category']));
        $this->product->setPreis(htmlSpecialChars($_POST['preis']));
        $this->product->setImg($img);
        $this->product->setLetzte_datum(date("Y-m-d H:i:s"));
        $this->product->setBeschreibung(htmlSpecialChars($_POST['beschreibung']));
        $this->product->setQuantity(intval($_POST['quantity']));
        $this->product->setDiscount($discount);
        $this->product->setDiscount_preis(htmlSpecialChars($_POST['discount_preis']));
        if ($this->product->getId() == 0) {
               
            $this->productDao->create($this->product);
            var_dump( $this->product->getId());
        } else {
            $this->productDao->update($this->product);
        }
    }

    private function delete() {
        $this->productDao->delete($this->product);
        $this->product = new Product();
    }

}

(new Product_Mng())->view();
