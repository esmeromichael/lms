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
					<li class="active"><a href="magazines.php">Magazines/ Newspaper</a></li>
					<li><a href="thesis.php">Thesis & Dissertation</a></li>
					<?php
						include('lost_damage.php');
					?>
				</ul> 
		<!--  -->
				<center class="title">
					<h1>Books List</h1>
				</center>
                <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
				<div class="pull-right">								
					<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
				</div>	
				<a href="add_magazines.php" class="btn btn-success"><i class="icon-plus icon-large"></i> Add Magazines</a>								
				</br>
				</br>													
                <thead>
                 <tr>
					<th colspan=2 style='text-align:center;'>Action</th>
					<th>Date Issue</th>
                    <th>Name</th>
					<th>Publication</th>                                                                    
					<th>Copy</th>																																	
                 </tr>
                 </thead>
                <tbody>
				 <?php 					 
				if(mysql_num_rows($user_query=mysql_query("select * from magazines_copy a, magazines b, magazines_info c where a.access_id=b.access_id and a.access_id=c.access_id  group by b.access_id"))>0){
				while($row=mysql_fetch_array($user_query)) {
				
				/*$user_query=mysql_query("select * from magazines
				LEFT JOIN magazines_info ON magazines.access_id = magazines_info.access_id
				LEFT JOIN magazines_copy ON magazines_info.access_id=magazines_copy.copy
				where magazines.status='Available' GROUP BY magazines.access_id  ASC")or die(mysql_error());
				while($row=mysql_fetch_array($user_query))
				{*/
				$access_id=$row['access_id']; 
				?>
				<tr class="del">
                <td>
					<a href="#" onclick="view_func('<?php echo $row['access_id']; ?>','<?php echo $row['title'];?>');" ><i class="icon-file icon-large"></i> View</a>
				</td>
				<td width="100">						
					<a rel="tooltip"  title="Edit" id="e<?php echo $access_id; ?>" href="#edit<?php echo $access_id; ?>" data-toggle="modal" class=""><i class="icon-pencil icon-large"></i>&nbsp;Edit</a>
                    <?php include('modal_edit_magazine.php'); ?>
				</td>
				<td><?php echo $row['date_issue']; ?> </td>
				<td><?php echo $row['title']; ?> </td>
                <td><?php echo $row['pub_name']; ?></td>				
                <td><?php echo $row['copy'] ?> </td> 				
				 </tr>
				<?php
				}
				}
				else
				{
				?>
				<tr>
				<td colspan= 6 style='text-align:center;'>No records found </td>
				
				<tr>
				<?php
				}
				?>
                </tbody>
                </table>
				
				<script type='text/javascript'>
				function view_func(id,a)
				{
					var el1=document.getElementById("view-book-parent");
					var el2=document.getElementById("view-book-child");
						el1.style.mozTransition="all 0.1s linear 0s";
						el2.style.mozTransition="all 0.1s linear 0s";
						el1.style.webkitTransition="all 0.1s linear 0s";
						el2.style.webkitTransition="all 0.1s linear 0s";
						el1.style.transition="all 0.2s linear 0s";
						el2.style.transition="all 0.2s linear 0s";
						el1.style.visibility="visible";
						el2.style.top="0px";
						$.post('view_magazine.php',{id:id,a:a},function(data)
						{
							el2.innerHTML="<div id='header-view'> <span class='icon-remove' onclick='close_view();'></span></div><div id='displayhere'><center>"+data+"</center></div>";
						});
				}				
				function close_view()
				{
					var el1=document.getElementById("view-book-parent");
					var el2=document.getElementById("view-book-child");
						el1.style.mozTransition="all 0.3s linear 0s";
						el2.style.mozTransition="all 0.3s linear 0s";
						el1.style.webkitTransition="all 0.3s linear 0s";
						el2.style.webkitTransition="all 0.3s linear 0s";
						el1.style.transition="all 0.3s linear 0s";
						el2.style.transition="all 0.3s linear 0s";
						el1.style.visibility="hidden";
						el2.style.top="-100px";
				}
				
				function callNum_func(calln,id)
				{
					var keyword=document.getElementById(calln).value;
					$.post('call_num.php',{keyword:keyword,id:id},function(data){									
					});
				}
				</script>			
			</div>		
			</div>
		</div>
    </div>
<div id='view-book-parent'>
		<div id='view-book-child'>
		</div>

</div>

<?php include('footer.php') ?>

