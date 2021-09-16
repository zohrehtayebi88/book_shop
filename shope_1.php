<?php

declare (strict_types=1);
require_once 'inc/tools.inc.php';
if (!isset($_SESSION["user_id"]))
    header('location:index.php');

class Shope extends Page {

    protected function viewNavigation(): void {
        include 'html/nav_category.html.php';
    }

    protected function viewContent(): void {

        include 'html/warenkorb_table1.html.php';
        if ($_POST) {
            foreach ($_POST as $id => $value) {
                $_SESSION["anzahl"][$id] = $value;
            }
        }
        if (isset($_SESSION["anzahl"]) && $_SESSION["anzahl"] != 0) {
            foreach ($_SESSION["anzahl"] as $id => $value) {
                if (isset($_SESSION["anzahl"]) && count($_SESSION["anzahl"]) > 0 && $value != 0 && $_SESSION["anzahl"][$id] != 0) {
                    $productDao = new ProductDao;
                    $product = $productDao->readOne($id);
                    if ($product->getDiscount() == 1) {
                        $preis = $product->getDiscount_preis();
                        $rabat = 'Angebotpreis  ';
                    } else {
                        $preis = $product->getPreis();
                        $rabat = '';
                    }

                    $gp = new Artikel($product->getId(), $preis, $value);
                    $total[] = $gp;
                    
                    include 'html/warenkorb_table2.html.php';
                } else {
                    $total = [];
                    // $control = 'disabled';
                }
            }
            $summe = new Beschtellung($total, 222);
            $gesamt = number_format($summe->total(), 2, ",", ".");
        } else {
            $gesamt = '00.00';
            //$control = 'disabled';
            
        }
        include 'html/warenkorb_table3.html.php';
    }

}

(new Shope())->view();
?>
