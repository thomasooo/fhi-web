var orig_answer_color = '';
var orig_header_color = '';
var quiz_disabled = false;

$(document).ready(function() {

	orig_answer_color = $('.quiz-qanswer').css('color');
	orig_header_color = $('.quiz-header').css('color');

	$('.quiz-question-animation').click(function(event) {
		if(quiz_disabled){
			return;
		}

		disable_quiz();

		var a = get_answer(this);
		var q = get_question_num();

		ajax_call(q, a);
	});

});

function set_quiz(qn, q, a, b, c, d){
	$('#quiz-question-num').html(qn);
	$('#quiz-question').html(q);
	$('#ans-a').html(a);
	$('#ans-b').html(b);
	$('#ans-c').html(c);
	$('#ans-d').html(d);
	enable_quiz();
}

function get_answer(a){
	return $(a).find('.quiz-answer-val').html();
}

function get_question_num() {
	return $('#quiz-question-num').html();
}

function disable_quiz(){
	quiz_disabled = true;
	$('.quiz-qanswer').css('color', 'rgb(222, 222, 222)');
	$('.quiz-header').css('color', 'rgb(173, 173, 173)');
	$('.quiz-question-animation').css('cursor', 'wait');
}

function enable_quiz(){
	quiz_disabled = false;
	$('.quiz-qanswer').css('color', orig_answer_color);
	$('.quiz-header').css('color', orig_header_color);
	$('.quiz-question-animation').css('cursor', 'pointer');
}

function ajax_call(qnum, answer){
	$.ajax({
		url: ajax_quiz_url,
		type: 'POST',
		dataType: 'json',
		data: {
			'qnum': qnum,
			'answer': answer
		}
	})
	.done(function(res) {
		if(res.message == 'question'){
			set_quiz(res.result.number, res.result.question, res.result.answers.a, res.result.answers.b, res.result.answers.c, res.result.answers.d);
		}else if(res.message == 'result'){
			window.location = quiz_result_url;
		}else{
			alert(res.message);
		}
	})
	.fail(function() {
		alert("undefined error");
	});

}
