<?php
require_once  '../inc/sql/function_sql.php';
require_once  '../inc/sql/sql.inc.php';
include_once '../inc/tools.inc.php';
include '../html/admin_nav.html.php';
 include '../html/eintragen_form.html.php';
   if (isset($_POST['neu'])) {

//            $uploaddir = 'uploads/';
//            $uploadfile = $uploaddir . basename($_FILES['imgfile']['name']);
//
//
//
//                    if (move_uploaded_file($_FILES['imgfile']['tmp_name'], $uploadfile)) {
//                        echo "Datei ist valide und wurde erfolgreich hochgeladen.\n";
//                    } else {
//                        echo "Möglicherweise eine Dateiupload-Attacke!\n";
//                    }
  $sql = "INSERT INTO buch"
                               . "( name ,autor ,thema ,img ,letzte_datum ,preis ,beschreibung)"
                               . "values ('"
                               . $_POST["name"] . "','"
                               . $_POST["autor"] . "','"
                               . $_POST["thema"] . "','"
                               . $_FILES["imgfile"]["name"]. "','"
                               . $_POST['datum']."','"
                               . $_POST["preis"] . "','"
                               . $_POST["besch"] . "')";


                            $result = mysqli_query($con, $sql);
                            $id = mysqli_insert_id($con);
       
                  
                      $productid=   $id;
                     $dir="uploads/$productid";                    
                                  if(!is_dir($dir)){
                             mkdir("../uploads/".$productid);
                     }
                         $uploaddir = '../uploads/'. $productid .'/' . $productid;
                         $uploadfile = $uploaddir . basename($_FILES['imgfile']['name']);



                    if (move_uploaded_file($_FILES['imgfile']['tmp_name'], $uploadfile)) {
                        echo "Datei ist valide und wurde erfolgreich hochgeladen.\n";
                   

                             } else {
                             echo "Möglicherweise eine Dateiupload-Attacke!\n";}
   }


                 

  
   echo"</table> </form></center>";
   include '../html/footer.php';
//TODO   https://www.w3schools.com/jquery/tryit.asp?filename=tryjquery_html_append
   ?>
