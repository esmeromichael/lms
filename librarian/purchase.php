<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_reports.php'); ?>

    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
			   <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><i class="icon-book icon-large"></i>&nbsp;Books Table</strong>
               </div> 
			   <!--  -->
				<ul class="nav nav-pills"> 
					<li><a href="acquisition.php">Donated Books</a></li>
					<li><a href="exchange.php"> Exchange Books</a></li>									
					<li class="active"><a href="purchase.php">Purchase Books</a></li>
				</ul> 
			   <!--  -->
			</div>
			<div class="span1">
			
			</div>
			<div class="span10">
				<center class="title">
				<label>LIST OF PURCHASED BOOKS</label>
				</br>
				</br>
				</center>
                <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
				<div class="pull-right">								
				<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
				</div>	
                <thead>
                    <tr>
					<th>Author </th>
					<th><center>Title  </center></th>
					<th><center>C Date </center></th>
					<th><center>No.of Cps </center></th>									
                    </tr>
                </thead>
                <tbody>								 
               <?php 									
				$user_query=mysql_query("select * from book_title
				LEFT JOIN book_info ON book_title.access_id = book_info.access_id
				LEFT JOIN book_category ON book_info.category_id=book_category.category_id
				LEFT JOIN book_copy ON book_title.access_id=book_copy.access_id
				where book_title.acquisition_id='3' GROUP BY book_title.access_id ORDER BY book_title.acc_num  ASC")or die(mysql_error());
				while($row=mysql_fetch_array($user_query))
				{
				?>
					<tr class="del">                    
					<td><?php echo $row['Author']; ?> </td>
					<td><?php echo $row['book_title']; ?> </td>					
					<td><center><?php echo $row['copyright_date']; ?> </center></td>
			
					<?php
					$query = mysql_query("SELECT * FROM book_title where acquisition_id ='3' and access_id='$row[access_id]'");
					$number=mysql_num_rows($query);
					?>
					<td><center><?php echo $number?> </center></td>
                    </tr>
				<?php
					}
				?>
                </tbody>
                </table>
				
					
			</div>		
			</div>
		</div>
<div id='view-book-parent'>
		<div id='view-book-child'>
		</div>
</div>

<?php include('footer.php') ?>

