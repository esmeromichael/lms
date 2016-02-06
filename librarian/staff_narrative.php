<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('staff_navbar_books.php'); ?>

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
			<li><a href="staff_books.php">All Books</a></li>										
			<li><a href="staff_magazines.php">Magazines/ Newspaper</a></li>
			<li class="active"><a href="staff_thesis.php">Thesis & Dissertation</a></li>
			<?php
			include('staff_lost_damage.php');
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
            <strong><i class="icon-book icon-large"></i>&nbsp;Narratives</strong>
        </div>
		<div class="pull-right">								
			<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
		</div>	
	

<select name="form" onchange="location = this.options[this.selectedIndex].value;">
 <option value="#">------------- View by  ------------</option>
 <option value="staff_narrative.php">Narrative</option>
 <option value="staff_thesis.php">Thesis</option>
</select>
			</br>			
           <thead>
            <tr>

             <th>Narrative No.</th>
			 <th>Date Added</th>
             <th colspan=3 style='text-align:center;'>Name of Student</th>                                
             <th>Course</th>                                 
             <th>School Year</th>  
			
			 
            </tr>
           </thead>
        <tbody>
		<?php
		$user_query=mysql_query("select * from narrative
			LEFT JOIN narrative_info ON narrative.narrative_acc_num = narrative_info.narrative_acc_num
			LEFT JOIN course ON narrative.course=course.course_id
		    ORDER BY narrative.narrative_acc_num  ASC")or die(mysql_error());
			while($row=mysql_fetch_array($user_query))
			{
			$id=$row['narrative_acc_num'];
		?>
			<tr class="del<?php echo $id ?>">
		<td> <?php echo $row['narrative_acc_num']; ?> </td>
		<td> <?php echo $row['date_added']; ?> </td>
		<td> <?php echo $row['lname']; ?> </td>
		<td> <?php echo $row['fname']; ?> </td>
		<td> <?php echo $row['mi']; ?> </td>
		<td> <?php echo $row['course_name']; ?></td>
		<td> <?php echo $row['sy']; ?></td>
		
		</td>
		</tr>
		<?php
			}
		?>
		
		</body>
		</table>
		</div>
	</div>
	</div>
	</div>
				
		