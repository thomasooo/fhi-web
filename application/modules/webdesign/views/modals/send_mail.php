<div id="send-mail-modal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Poslať tento výsledok na e-mail</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="email-input">Tvoj e-mail</label>
						<input type="email" class="form-control" id="email-input" placeholder="E-mail">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Zatvor</button>
				<button type="button" class="btn btn-red" onclick="send_email_action()">Odoslať</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
