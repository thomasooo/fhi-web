
$(document).ready(function() {
	$('form').submit(function(event){
		event.preventDefault();
		send_email_action();
	});
});

function send_email() {
	$('#send-mail-modal').modal('show');
}

function send_email_action() {
	disable_screen('sending');
	$('#send-mail-modal').modal('hide');

	if(!$("#email-input").length){
		message_modal('Musíš zadať e-mail.');
		enable_screen();
	}

	var email = $('#email-input').val();

	$.post(ajax_send_email_url, {recipient: email}, function(data, textStatus, xhr) {
		message_modal(data);
		enable_screen();
	});
}

function message_modal(val) {
	$('#modal-message').html(val);
	$('#message-modal').modal('show');
}

function disable_screen(html){
	$('.loader .txt').html('<i class="fa fa-spinner fa-spin"></i> ');
	$('.loader .txt').append(html);
	$('.loader').fadeIn(200);
}

function enable_screen(){
	$('.loader').fadeOut(200);
}
