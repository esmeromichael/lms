	<div id="#delete_book<?php echo $borrow_id; ?>s" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-success">Do you want to Return this Book?</div>

		</div>
		<div class="modal-footer">
			<a class="btn btn-success" href="return_save.php<?php echo '?id='.$id; ?>">Yes</a>
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
	
