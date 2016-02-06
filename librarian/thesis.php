<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_books.php'); ?>

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
			<li><a href="books.php">All Books</a></li>										
			<li><a href="reserve.php">Reserved Books</a></li>
			<li><a href="magazines.php">Magazines/ Newspaper</a></li>
			<li class="active"><a href="thesis.php">Thesis & Dissertation</a></li>
			<?php
			include('lost_damage.php');
			?>
		</ul>
	</div>
		<div class="span2">			     			
				<?php
				include('thesis2.php');
				?>
									 
		</div>		
		<div class="span10">
		<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
			
        <div class="alert alert-success">
            <strong><i class="icon-book icon-large"></i>&nbsp;Thesis</strong>
        </div>
		<div>
		<select name="form1" onchange="location = this.options[this.selectedIndex].value;">
 <option value="#">------------- View by  ------------</option>
 <option value="narrative.php">Narrative</option>
 <option value="thesis.php">Thesis</option>
</select>
</div>
		<div class="pull-right">								
			<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
		</div>	

		</br>			
           <thead>
            <tr>
			 <th>Number</th>
             <th>Title</th>
             <th>Student's Name</th>                                
             <th>Course</th>                                 
             <th>School Year</th> 
			 <th class="action">Action</th>			 
            </tr>
           </thead>
        <tbody>
		<?php
		$user_query=mysql_query("select * from thesis
			LEFT JOIN thesis_info ON thesis.thesis_acc_num = thesis_info.thesis_acc_num
			LEFT JOIN course ON thesis_info.course=course.course_id
		    ORDER BY thesis.thesis_acc_num  ASC")or die(mysql_error());
			while($row=mysql_fetch_array($user_query))
			{
			$id=$row['thesis_acc_num'];
		?>
		<tr class="del">
		<td> <?php echo $row['thesis_acc_num']; ?> </td>
		<td> <?php echo $row['title']; ?> </td>
		<td> <?php echo $row['student_name']; ?></td>
		<td> <?php echo $row['course_name']; ?></td>
		<td> <?php echo $row['sy']; ?></td>
		<td class="action"> 
			<a class="btn btn-primary" title="Click to Edit" href="edit_thesis.php<?php echo '?id='.$id; ?>"><i class="icon-pencil icon-large"></i></a>										
		</td>

		</tr>
		<?php
			}
		?>
		</tbody>
		</body>
		</table>
		</div>
	</div>
	</div>
	</div>
				
		