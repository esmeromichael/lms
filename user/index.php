<html>
<?php include('header.php'); ?>
<style>
.s:hover{ box-shadow:0px 0px 9px grey; -moz-border-radius:25px;}
</style>

<?php include('nav.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">
					<div class="sti">
						<!--img src="../LMS/E.B. Magalona.png" class="img-rounded"--> 
					</div>
					
</br>
</br>
</br>		
</br>
</br>
</br>				
<table align="center" width="500" border="0" style="margin-top:10px;">
<tr><td>

<a href="faculty_login.php">
<img onmouseover="bigImg(this)" onmouseout="normalImg(this)" class="s" title="Click this if you are faculty."border="0" src="img/employee1.png" alt="Smiley" width="150" height="150">
<!--<img src="img/employee1.png" class="s" id="login "title="Faculty" height="150" /> -->
</a>

</td>
<td align="right">
<a href="index1.php">
<img onmouseover="bigImg(this)" onmouseout="normalImg(this)" class="s" title="Click this if you are student."border="0" src="img/people-icon1.png" alt="Smiley" width="150" height="150">

</a>
</td>
<script>
function bigImg(x) {
	x.style.transition="all 0.3s ease 0s";
	x.style.transform="scale(1.2)";
}

function normalImg(x) {
    x.style.transform="scale(1)";
	x.style.transition="all 0.3s ease 0s";
}
</script>
</tr>
</table>
				
			</div>		
			</div>
		</div>
    </div>
	
	
</br>
</br>
</br>	
<?php //include('footer.php'); ?>

</html>