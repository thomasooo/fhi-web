<!--Quiz Section-->
<section class="content-section">
	<div class="grey-bg bottom-grey-border">
		<div class="container">
			<!-- row of columns -->
			<div class="row">
				<div class="col-md-8 col-md-offset-4">
					<div class="quiz-margin">
						<h2 class="quiz-header"><span id="quiz-question-num">1</span>. <span id="quiz-question"><?=$q['question']?></span></h2>
					</div>
				</div>
			</div>
		</div> <!-- /container -->
	</div>
	<div class="container quiz-container">
		<!-- row of columns -->
		<div class="row quiz">
			<div class="col-md-8 col-md-offset-4 text-center">
				<div class="quiz-margin">
					<div class="row quiz-qrow1">
						<div class="col-md-6">
							<div class="quiz-question-animation">
								<span class="hidden quiz-answer-val">a</span>
								<div class="quiz-qnum">A.</div>
								<div class="quiz-qanswer" id="ans-a"><?=$q['answers']['a']?></div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="quiz-question-animation">
								<span class="hidden quiz-answer-val">b</span>
								<div class="quiz-qnum">B.</div>
								<div class="quiz-qanswer" id="ans-b"><?=$q['answers']['b']?></div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="quiz-question-animation">
								<span class="hidden quiz-answer-val">c</span>
								<div class="quiz-qnum">C.</div>
								<div class="quiz-qanswer" id="ans-c"><?=$q['answers']['c']?></div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="quiz-question-animation">
								<span class="hidden quiz-answer-val">d</span>
								<div class="quiz-qnum">D.</div>
								<div class="quiz-qanswer" id="ans-d"><?=$q['answers']['d']?></div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- /container -->
</section>
<!--Quiz Section End-->
