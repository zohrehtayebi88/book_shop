<body>

<h2>The XMLHttpRequest Object</h2>

<?php if($_POST)
 print_r($_POST);
?>
 
<form  id="myForm"   method="post" action ="classtest.php" >
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" ><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" ><br><br>
  <input type="submit" value="Submit">
</form> 

<script type="text/javascript">

// $("#myForm").ajaxForm({
//
//           type: "POST",
//           url: "classtest.php",
//           data:  $('#myForm').serialize(),
//          
//         });

    </script>
</body>
</html>
