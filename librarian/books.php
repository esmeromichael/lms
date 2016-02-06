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
					<li class="active"><a href="books.php">All Books</a></li>										
					<li><a href="reserve.php">Reserved Books</a></li>
					<li><a href="magazines.php">Magazines/ Newspaper</a></li>
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
				<a href="add_books.php" class="btn btn-success"><i class="icon-plus icon-large"></i> Add Books</a>
				</br>
				</br>
                <thead>
                <tr>
					<th colspan=2 style='text-align:center;'>Action</th>
					<th>Call No.</th>
                    <th>Category</th>
					<th>Book Title</th>                                                                    
					<th>Author</th>														
					<th>Publisher Name</th>
					<th>ISBN</th>
					<th>Copyright Year</th>	
					<th>Available</th>
					<th>Reserve</th>
					<th>Copy/s</th>										
                </tr>
                </thead>
                <tbody>								 
               <?php 									
				$user_query=mysql_query("select * from book_copy a, book_title b, book_info c, book_category x where a.access_id=b.access_id and a.access_id=c.access_id and x.category_id=c.category_id group by b.book_title")or die(mysql_error());
				while($row=mysql_fetch_array($user_query))
				{
				?>
					<tr class="del">
                    <td> <a href="#" onclick="view_func('<?php echo $row['access_id']; ?>','<?php echo $row['acquisition_id']; ?>');" ><i class="icon-file icon-large"></i> View</a>
					</td>
					<td>
						<?php echo"<a href='#' onclick='update_func(\"".$row['access_id']."\",\"".$row['category_id']."\",\"".$row['book_title']."\",\"".$row['Author']."\",\"".$row['publisher_name']."\",\"".$row['isbn']."\",\"".$row['copyright_date']."\",\"".$row['acquisition_id']."\",\"".$row['stat_book']."\",\"".$row['copy']."\",\"".$row['available_no']."\",\"".$row['call_num']."\");' ><i class='icon-edit icon-large'></i> Edit</a>";?>
					</td>
					<td><?php echo $row['call_num']; ?> </td>
					<td><?php echo $row['classname']; ?> </td>
                    <td><?php echo $row['book_title']; ?></td>		
                    <td><?php echo $row['Author']; ?> </td> 				
					<td><?php echo $row['publisher_name']; ?></td>
					<td><?php echo $row['isbn']; ?></td>
					<td><?php echo $row['copyright_date']; ?></td>					 
					<td><?php echo $row['available_no']; ?> </td>
					<td>1 </td>
					<td><?php echo $row['copy']; ?> </td>
                    </tr>
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
						$.post('viewselected.php',{id:id,a:a},function(data)
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
				function update_func(acc,cat,title,authorname,pub,isbn,copy,aqua,stat,cpy,avail,cn)
				{
					var el1=document.getElementById("view-book-parent");
					var el2=document.getElementById("view-book-child");
						el1.style.mozTransition="all 0.3s linear 0s";
						el2.style.mozTransition="all 0.3s linear 0s";
						el1.style.webkitTransition="all 0.3s linear 0s";
						el2.style.webkitTransition="all 0.3s linear 0s";
						el1.style.transition="all 0.3s linear 0s";
						el2.style.transition="all 0.3s linear 0s";
						el1.style.visibility="visible";
						el2.style.top="0px";
					$.post('updateselected.php',{cn:cn,avail:avail,acc:acc,title:title,cat:cat,authorname:authorname,pub:pub,isbn:isbn,copy:copy,aqua:aqua,stat:stat,cpy:cpy},function(data)
					{
						el2.innerHTML="<div id='header-view'> <span class='icon-remove' onclick='close_view();'></span></div><div style='clear:both;'></div><div id='displayhere'><center>"+data+"</center></div>";									
					});
				}
				
				function update_go(c_orig,acc)
				{
					var title=$('#title').val();
					var cat=$('#cat').val();
					var pub=$('#pub').val();
					var c=$('#c').val();
					var acq=$('#acq').val();
					var isbn=$('#isbn').val();
					var copy=$('#copy').val();
					var author=$('#author').val();
					var b=0;
					var cn=$('#call').val();
						if(document.getElementById("borrow").checked==true)
						{
							b=1;
						}
						else{ b=0; }
						$.post('update_go.php',{cn:cn,b:b,acc:acc,cat:cat,title:title,author:author,pub:pub,isbn:isbn,copy:copy,acq:acq,c:c,c_orig:c_orig},function(data)
							{
								document.location.href='books.php';
							});
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
<div id='view-book-parent'>
		<div id='view-book-child'>
		</div>
</div>

<?php include('footer.php') ?>

