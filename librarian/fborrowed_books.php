<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_borrow.php'); 
$id=$_GET['id'];?>
<div class="container">
	<div class="margin-top">
	<div class="row">

	<div class="span12">
		<div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
           <i class="icon-user icon-large"></i>			
        </div>
		<table cellpadding="1" cellspacing="5" border="1" class="table  table-bordered" id="example">
		<div class="pull-right">
			<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
		</div>
		<p><a href="fac_brw_book.php" class="btn btn-success"><i class="icon-arrow-left"></i>&nbsp;Back</a></p>
		
		<thead>
		<th> </th>
             <tr>
				<th>Acc. No </th>
                <th>Book Title</th>                                 
                <th>Author</th>
				<th>Date Borrowed</th>			
				<th>Status</th>
				<th>Return</th>
             </tr>
           </thead>	 
		   <tbody>
		   <?php
			$user_query=mysql_query("select * from faculty_borrow
			LEFT JOIN book_title ON faculty_borrow.acc_num= book_title.acc_num	
			LEFT JOIN book_info ON book_title.access_id= book_info.access_id
			where faculty_borrow.id_number='$id' and faculty_borrow.status='Pending'")or die(mysql_error());
			while($row=mysql_fetch_array($user_query)){
			$borrow_id=$row['faculty_borrow_id'];
			$acc_num=$row['acc_num'];
		   ?>
			<tr class="del<?php echo $id ?>">
			
			<td><?php echo $row['acc_num']; ?> </td>
			<td><?php echo $row['book_title']; ?> </td>
			<td><?php echo $row['Author']; ?> </td>
			<td><?php echo $row['date_borrow']; ?> </td>
			<td><?php echo $row['status']; ?> </td>
			
			<td> <a rel="tooltip"  title="Return" id="<?php echo $borrow_id; ?>" href="#delete_book<?php echo $borrow_id; ?>" data-toggle="modal"    class="btn btn-success"><i class="icon-check icon-large"></i>Return</a>
            <?php include('modal_fac_return.php'); ?>
			</td>
			</tr>
		
		   </tbody>
		   
		   <?php
		   }
		   ?>
		   
	</div>

	</div>
	</div>
</div>


</table>