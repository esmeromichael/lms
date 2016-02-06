<?php include('header.php'); ?>
<?php include('staff_navbar_services.php'); ?>
   <div class="container">
	<div class="margin-top">
	<div class="span12">
		<div class="row">	
			<div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><i class="icon-user icon-large"></i>&nbsp;Borrow Table for Student</strong>
            </div>
			<ul class="nav nav-pills"> 
				<li class="active"><a href="#">Borrow</a></li>																												
			</ul> 
		<div class="span12">		
		<form method="post">
		<div class="span3">
		
			<div class="control-group">
			<label class="control-label" for="inputPassword">ID Number: </label>
				<div class="controls">
				<input type="password" name="id" id="id" placeholder="ID Number" required="required"></input>
				</div>
			</div>
			<div class="control-group"> 
			<div class="controls">
				<button name="submit" class="btn btn-success"><i class="icon-plus-sign icon-large"></i> Borrow</button>
				
			</div>
			
			</div>
		</div>
		
		<div class="span8">
			<div class="alert alert-success"><strong>Select Book</strong></div>
            <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
            <thead>
                <tr>
                <th>Call Number</th>
                <th>Category</th>                      
                <th>Book title</th>                                 
				<th>Author</th>
                <th>C_Year</th>										
				<th>Publisher Name</th>
				<th>ISBN</th>
                <th>Copy/s</th>
				<th>Add</th>										
                </tr>
            </thead>
            
			<tbody>
			<?php							 
            $user_query=mysql_query("select * from book_title
			LEFT JOIN book_info ON book_title.access_id = book_info.access_id
			LEFT JOIN book_category ON book_info.category_id=book_category.category_id
			LEFT JOIN book_copy ON book_title.access_id=book_copy.access_id
			where book_title.stat_book='Available' GROUP BY book_title.book_title")or die(mysql_error());
			while($row=mysql_fetch_array($user_query))
			{				
				$access_id=$row['access_id'];
				$category_id=$row['category_id'];
			?>								
			<tr class="del"> 
				<td><?php echo $row['call_num']; ?> </td>					
				<td><?php echo $row['classname']; ?> </td>
				<td><?php echo $row['book_title']; ?></td>		
				<td><?php echo $row['Author']; ?> </td> 
				<td><?php echo $row['copyright_date']; ?></td>										
				<td><?php echo $row['publisher_name']; ?></td>
				<td><?php echo $row['isbn']; ?></td>
					<?php
					$ncopy=1;
					$navail=0;
					$z=0;
					$acc_f=0;
						$user_query2=mysql_query("select * from book_title where access_id='$access_id' and stat_book='Available'")or die(mysql_error());
						while($row2=mysql_fetch_array($user_query2)){
							$z++;
							$ncopy++;
							if($row2['stat_book']=='Available')
								{
								$navail++;
								}
							if($z==1)
								{
								$acc_f=$row2['acc_num'];
								}												
							}											
					?>
						<td><?php echo $navail; ?> </td>
						<td width="20">
							<input id="" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $acc_f;?>" >												
                        </td>																										
            </tr>
	<?php   } 
//$xxxx=mysql_query("select*from set_book");
//$getb=mysql_fetch_array($xxxx);
	?>
            </tbody>
            </table>
			
			
<?php
if(isset($_POST['submit']) && isset($_POST['id'])){
include("dbcon.php");
error_reporting(E_ALL^E_NOTICE);
$id=$_POST['id'];

$result=mysql_query("select*from return_time");
$result1=mysql_query("select*from borrow_time");
$gettime=mysql_fetch_array($result);



$Today = date('y:m:d');
$new = date('l, F d, Y', strtotime($Today));

$tomorrow = mktime(0, 0, 0, date("m"), date("d")+1, date("y"));
$ex=date("Y-m-d", $tomorrow);

if(mysql_num_rows($result1=mysql_query("SELECT * FROM `faculty` WHERE id='".$_POST['id']."'"))>0) {
$row1=mysql_fetch_array($result1);
foreach ($_POST['selector'] as $t)
{

mysql_query("update book_title set stat_book='Borrow' where acc_num='$t'");

mysql_query("insert into faculty_borrow(id_number,acc_num,date_borrow,status)
			values('$id','$t',NOW(),'Pending')")or die(mysql_error());
			
			
/*mysql_query("INSERT INTO `user_login` (id_num, course_id, login_date, login_time,purpose, stat_login) VALUES ('$id', '".$row1['crs_id']."', now(), now(), 'Research', 'Login')")
							or die('Error logging in...'.mysql_error()); */											
			
	echo"Borrow successfully";		
}
		
}
else{
echo "Please check your ID Number";
}	
}

?>
		</form>
		</div>		
		</div>		
	
		</div>
	</div>
</div>
<?php include('footer.php') ?>