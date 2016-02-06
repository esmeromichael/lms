							<!-- Modal -->
<div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header"></div>
<div class="modal-body">
    <form class="form-horizontal" method="post">
				<div class="control-group">
				<label class="control-label" for="inputEmail">Enter ID Number</label>
				<div class="controls">
				<input type="text" name="id" id="inputEmail" placeholder="ID Number" required>
				</div>
				</div>
						
						
    <div class="control-group">
    <div class="controls">
    <button type="submit" button="submit" name="submit" class="btn btn-success">Submit</button>
    </div>
    </div>
	<?php
	if (isset($_POST['submit'])){
	$id=$_POST['id'];
	
	if(mysql_num_rows($result=mysql_query("SELECT * FROM `student` WHERE id='".$_POST['id']."'"))>0) {
	$row=mysql_fetch_array($result);	
		$id=$row['id'];
		$_SESSION['id_borrow']=$id;
		echo "<br>";
		echo '<script>
		window.location="student_borrow.php";
		</script>';	
		}
	
	else if(mysql_num_rows($result2=mysql_query("SELECT * FROM `faculty` WHERE id='".$_POST['id']."'"))>0) {
	$row2=mysql_fetch_array($result2);	
		$id=$row['id'];
		$_SESSION['id_borrow']=$id;
		echo "<br>";
		echo '<script>
		window.location="serv_faculty.php";
		</script>';	
		}
	else
	{
	?><script>
	window.alert('Please check your Id Number!');		
</script>';	
<?php
	}
		}
		
	
	
	?>
    </form>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
</div>
</div>