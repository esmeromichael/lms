<?php include('header.php'); ?>

    <div class="container">
		<div class="margin-top">
			<div class="row">
				<div class="span12">
					<div class="sti">
						<!--img src="../LMS/E.B. Magalona.png" class="img-rounded"-->
					</div>
					<div class="login">
					<div class="log_txt">
						<p><strong>Please Enter the Details Below..</strong></p>
					</div>
						<form class="form-horizontal" method="POST" action="">
							<div class="control-group">
								<label class="control-label" for="inputEmail">Username</label>
								<div class="controls">
								<input type="text" name="username" id="username" placeholder="Username" required>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Password</label>
								<div class="controls">
								<input type="password" name="password" id="password" placeholder="Password" required>
							</div>
							</div>
							<div class="control-group">
								<div class="controls">
							<button id="login" onclick="submit_func();" name="submit" type="button" class="btn"><i class="icon-signin icon-large"></i>&nbsp;Submit</button>
							</div>
							</div>
							<div id="res"></div>
							<script type="text/javascript">
							function submit_func(){
								var pw=$('#password').val();
								var un=$('#username').val();
								$.post('loginscript.php',{pw:pw,un:un},function(data){
									if(data==1){
										$('#res').html('<div class="alert alert-danger">Access Denied</div>');
									}
									else{
										document.body.innerHTML=data;
									}
								});
							}
							</script>
						</form>
					</div>
				</div>
			</div>
		</div>
    </div>

<?php include('footer.php'); ?>