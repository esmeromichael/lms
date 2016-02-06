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
		<div class="span2">

				<p><a href="view_borrow.php" class="btn btn -success"><i></i>&nbsp;Back</a></p>
				<div class="alert alert-success"><strong>Select to Return</strong></div>
			<div class="control-group">
				<div class="controls">
				<center>
					<button name="submit" class="btn btn-success"><i class="icon-plus-sign icon-large"></i> Return</button>	</center>
				</div>
			</div>

			<?php
			if(isset($_POST['submit'])){
			include("dbcon.php");
			error_reporting(E_ALL^E_NOTICE);
			$id=$_GET['id'];
				$query=mysql_query("select from borrow_info where id_number='$id'");
				foreach ($_POST['selector'] as $t)
				{

				mysql_query("update borrow_info set borrow_stat='Returned' where acc_num='$t'");

				$result1=mysql_query("SELECT * FROM `borrow_info` WHERE id_number='".$_GET['id']."'");
				$row1=mysql_fetch_array($result1);

				mysql_query("insert into borrow_return(borrow_id,date_return,time_return,status)
				values('".$row1['borrow_id']."',NOW(),NOW(),'nofines')")or die(mysql_error());
				?>
				<script>
				window.alert('Successfully returned!');
				window.location.href = 'view_borrow.php';
				</script>
				<?php
				}
			}
			?>
		</div>
		<div class="span9">
			<div class="alert alert-success"><strong></strong></div>
            <table cellpadding="0" cellspacing="1" border="1" class="table" id="example">
            <thead>
             <tr>
				<th>Acc. No </th>
                <th>Book Title</th>
                <th>Author</th>
				<th colspan=2 style='text-align:center;'>Borrow Date&Time</th>
				<th>Due Date</th>
				<th>Status</th>
				<th>Return</th>
				<th>Fines</th>
				<th><center>Status</center></th>
             </tr>
            </thead>
			<tbody>
            <?php
				$user_query=mysql_query("select * from borrow_info
			LEFT JOIN book_title ON borrow_info.acc_num= book_title.acc_num
			LEFT JOIN book_info ON book_title.access_id= book_info.access_id
			where borrow_info.id_number='$id' and borrow_info.borrow_stat='Pending'")or die(mysql_error());
			while($row=mysql_fetch_array($user_query)){
			$borrow_id=$row['borrow_id'];
			$acc_num=$row['acc_num'];
		   ?>
			<tr class="del<?php echo $id ?>">

			<td><?php echo $row['acc_num']; ?> </td>
			<td><?php echo $row['book_title']; ?> </td>
			<td><?php echo $row['Author']; ?> </td>
			<td><?php echo $row['date_borrow']; ?> </td>
			<td><?php echo $row['time_borrow']; ?> </td>
			<td><?php echo $row['due_date']; ?> </td>
			<td><?php echo $row['borrow_stat']; ?> </td>
			<td width="20">
				<center><input id="" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $row['acc_num'];?>" > </center>
            </td>
			<td>
                <?php
				    $borrowed_date = $row['datetime'];
				    ini_set('date.timezone', 'Asia/Manila');
				    $date_now = date("Y-m-d H:i:s", time());
				    $datetime1 = new DateTime($borrowed_date);
				    $datetime2 = new DateTime($date_now);
				    $interval = $datetime1->diff($datetime2);

				    $fines = 0;
					for($i=0; $i<=$interval->d; $i++){
					    $modif = $datetime1->modify('+1 day');
					    $weekday = $datetime1->format('w');

					    if($weekday != 0 && $weekday != 6){
					        $fines++;
					    }
					}

					$total = $fines * 10;
					echo number_format($total, 2, '.', ',');
				?>
                <input id=""  name="fines" type="hidden" value="<?php echo number_format($total, 2, '.', ','); ?>" >
            </td>
			<td>
			<center>
				<a rel="tooltip"  title="Return" id="<?php echo $borrow_id; ?>" href="#delete_book<?php echo $borrow_id; ?>" data-toggle="modal"><i class="icon-check icon-large"></i>Return</a>
            	<?php include('modal_return.php'); ?>
				<a rel="tooltip"  title="Stop if you lost the book" id="<?php echo $borrow_id; ?>" href="#delete_book<?php echo $borrow_id; ?>" data-toggle="modal"><i class="icon-check icon-large"></i>Stop</a>
            	<?php include('modal_return.php'); ?>
				</center>
			</td>

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
