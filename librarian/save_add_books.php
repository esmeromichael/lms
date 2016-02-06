<?php 
include('dbcon.php');
if (isset($_POST['submit'])){




$set_books=$_POST['set_books'];

								
mysql_query("update set_book set max_book ='$set_books'");

echo '<script type="text/javascript">

          window.onload = function () { alert("SAVED!!!."); }

	</script>'; 



}


?>	