$(document).ready(function(){
	$('.delete-button').click(function(e) 
	{ 
		action = $(this).data('action');
		$('#deleteModal').find('#modal-form-delete').attr('action', action);
		$('#deleteModal').modal('show');
	});
	$('.import-button').click(function(e) 
	{ 
		action = $(this).data('action');
		$('#importModal').find('#modal-form-import').attr('action', action);
		$('#importModal').modal('show');
	});
});