<?php include('dbcon.php');?>
<div class="addstudent" style="left:0px; margin:0px;">
						<div class="details">Please Enter Details Below</div>		
						<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">			
			
						<div class="control-group">
							<label class="control-label" for="title" >Book_title:</label>
							<div class="controls">
							<input type="text" class="span4" id="title" value='<?php echo $_POST['title'];?>' name="book_title"  placeholder="Book Title" required>
							</div>
						</div>
		
						<div class="control-group">
						<label class="control-label" for="cat">Category</label>
							<div class="controls">
							<select name="category_id" id='cat' class="span4" >
												
								<?php
								$cat_query = mysql_query("select * from book_category");
								while($cat_row = mysql_fetch_array($cat_query)){
								if($cat_row['category_id']==$_POST['cat'])
								{
								?>
									<option value="<?php echo $cat_row['category_id']; ?>" selected='selected'><?php echo $cat_row['classname']; ?></option>
								<?php
								}
								?>
									<option value="<?php echo $cat_row['category_id']; ?>"><?php echo $cat_row['classname']; ?></option>
								<?php  } ?>
							</select>
							</div>
						</div>
		
		<div class="control-group">
								<label class="control-label" for="author">Author:</label>
									<div class="controls">
										<input type="text"  class="span4" value="<?php echo $_POST['authorname'];?>" id="author" name="author"  placeholder="Author" required>
									</div>
		</div>
		

		<div class="control-group">
			<label class="control-label" for="pub">Publisher Name:</label>
			<div class="controls">
			<input type="text"  class="span4" id="pub" name="publisher_name"  value="<?php echo $_POST['pub'];?>" placeholder="Publisher Name" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="isbn">Isbn:</label>
			<div class="controls">
			<input type="text"  class="span4" id="isbn" name="isbn"  value="<?php echo $_POST['isbn'];?>" placeholder="ISBN" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="copy">Copyright Year:</label>
			<div class="controls">
			<input type="text" id="copy" class="span4" name="copyright_year" value="<?php echo $_POST['copy'];?>" placeholder="Copyright Year" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="call">Call Number:</label>
			<div class="controls">
			<input type="text" id="call" name="call"  class="span4" value='<?php echo $_POST['cn']; ?>' placeholder="Call number" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="c">Copy/s:</label>
			<div class="controls">
			<input type="text" id="c" class="span4"  name="copy"  readonly value="<?php echo $_POST['cpy'];?>" placeholder="Copy/s" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="acq">Acquisition:</label>
			<div class="controls">
			<select name="status" required id='acq' class="span4" >
			<?php
			$r=mysql_query("select*from acquisition");
			while($rr=mysql_fetch_array($r))
			{
				if($rr['acq_id']==$_POST['aqua'])
				{
			?>
					<option value="<?php echo $rr['acq_id']?>" selected='selected'><?php echo $rr['acq_name'];?></option>
			<?php
				}
			?>
					<option value="<?php echo $rr['acq_id']?>"><?php echo $rr['acq_name'];?></option>
			<?php
			}
			?>
				
			</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="borrow"></label>
			<div class="controls">
			<label>
			<input type="checkbox" id="borrow" <?php if($_POST['avail']!='N/A'){ echo" checked='checked'";}?> value='1' style="width:00px;" name="borrow"  class="span4" placeholder="Copy/s"/>
			&nbsp;&nbsp;Allow users to borrow 
			</label>
			</div>
		</div>
		
		<div class="control-group">
			<div class="controls">
			<button name="submit" type="button" onclick="update_go('<?php echo $_POST['cpy'];?>','<?php echo $_POST['acc'];?>');" class="btn btn-success"><i class="icon-edit icon-large"></i>&nbsp;Update</button>
			</div>
		</div>
    </form>					
					</div>		