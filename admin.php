<?php
declare (strict_types=1);
require_once 'inc/tools.inc.php';

class Admin extends Admin_page
{

    protected function viewNavigation() : void
        {  
            
        }
    protected function viewContent() : void
        { 
        $_GET['ref']
                ?$ref = $_GET['ref']
                :$ref = '';
        switch ($ref)
        {
            case'ins' :
                header('location:produc_ud.php');
        break;
            case'up' :
        break;
            case'ins_cat' :
        break;
            case'up_cat' :
        break;
            case'user_all' :
        break;
            case'vlm' :
        break;
            case'grf' :
        break;
        }
        }
        
}
(new Admin())->view();
?>