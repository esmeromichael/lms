<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_borrow.php'); ?>
<?php $id=$_GET['id'];?>
    <div class="container">
	<div class="margin-top">
	<div class="span12">
		<div class="row">
			<div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><i class="icon-user icon-large"></i>&nbsp;Borrow Table for Student</strong>
            </div>

		<div class="span12">
		<form method="post">
		<div class="span3">

				<p><a href="fac_brw_book.php" class="btn btn-success"><i></i>&nbsp;Back</a></p>

			<div class="control-group">
				<div class="controls">
					<button name="submit" class="btn btn-success"><i class="icon-plus-sign icon-large"></i> Return</button>
				</div>
			</div>

			<?php
			if(isset($_POST['submit'])){
			include("dbcon.php");
			error_reporting(E_ALL^E_NOTICE);
			$id=$_GET['id'];
				$query=mysql_query("select from faculty_borrow where id_number='$id'");
				foreach ($_POST['selector'] as $t){

				mysql_query("update faculty_borrow set status='Returned' where acc_num='$t'");

				$result1=mysql_query("SELECT * FROM `faculty_borrow` WHERE id_number='".$_GET['id']."'");
				$row1=mysql_fetch_array($result1);

				mysql_query("insert into faculty_return(faculty_borrow_id,id_number,acc_num,date_return)
				values('".$row1['faculty_borrow_id']."','$id','$t',NOW())")or die(mysql_error());
				?>
				<script>
				window.alert('Successfully returned!');
				window.location.href = 'fac_brw_book.php';
				</script>
				<?php
				}
			}
			?>
		</div>
		<div class="span8">
			<div class="alert alert-success"><strong></strong></div>
            <table cellpadding="0" cellspacing="1" border="1" class="table" id="example">
            <thead>
             <tr>
				<th>Acc. No </th>
                <th><center>Book Title</center></th>
                <th>Author</th>
				<th>Date Borrowed</th>
				<th><center>Status</center></th>
				<th>Action</th>
             </tr>
            </thead>
			<tbody>
            <?php
			$user_query=mysql_query("select * from faculty_borrow
			LEFT JOIN book_title ON faculty_borrow.acc_num= book_title.acc_num
			LEFT JOIN book_info ON book_title.access_id= book_info.access_id
			where faculty_borrow.id_number='$id' and faculty_borrow.status='Pending'")or die(mysql_error());
			while($row=mysql_fetch_array($user_query)){
			$faculty_borrow_id=$row['faculty_borrow_id'];
			$acc_num=$row['acc_num'];
			$id=$row['id_number'];
		   ?>
			<tr class="del<?php echo $id ?>">
			<td><?php echo $row['acc_num']; ?> </td>
			<td><?php echo $row['book_title']; ?> </td>
			<td><?php echo $row['Author']; ?> </td>
			<td><?php echo $row['date_borrow']; ?> </td>
			<td><center><?php echo $row['status']; ?> </center></td>
				<td width="20">
					<center><input id="" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $row['acc_num'];?>" > </center>
                </td>
			</tr>
			<?php   }
			?>
            </tbody>
            </table>

		</form>
		</div>
		</div>
	</div>
	</div>
	</div>
	</div>