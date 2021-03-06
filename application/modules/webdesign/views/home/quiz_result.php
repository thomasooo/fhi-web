<!--Quiz Section-->
<section class="content-section">
	<div class="grey-bg bottom-grey-border">
		<div class="container">
			<!-- row of columns -->
			<div class="row">
				<div class="col-md-8 col-md-offset-4">
					<div class="quiz-margin">
						<h2 class="quiz-header">Správne: <?=$result['counts']['correct']?> z <?=$result['counts']['total']?></h2>
					</div>
				</div>
			</div>
		</div> <!-- /container -->
	</div>
	<div class="container quiz-container">
		<!-- row of columns -->
		<div class="row quiz">
			<div class="col-md-8 col-md-offset-4">
				<div class="quiz-margin">
					<div class="row quiz-qrow1">
						<div class="col-md-12">
							<a href="<?=site_url('webdesign/home/export_csv')?>" class="btn btn-red-intext btn-mr"><i class="fa fa-table" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;EXPORT DO CSV</a>
							<a href="javascript: void(0)" onclick="send_email()" class="btn btn-red-intext btn-mr"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;POSLAŤ NA E-MAIL</a>
						</div>
					</div>
				</div>
				<div class="quiz-margin">
					<?php foreach($result['results'] as $k => $r): ?>
						<div class="row quiz-qrow1">
							<div class="col-md-12">
								<h3 class="quiz-res-header"><?=$k?>. <?=$r['question']?></h3>
							</div>
						</div>
						<div class="row quiz-qrow1">
							<div class="col-md-6">
								<div class="quiz-question <?=$r['classes']['a']?>">
									<div class="quiz-qnum">A.</div>
									<div class="quiz-qanswer"><?=$r['answers']['a']?></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="quiz-question <?=$r['classes']['b']?>">
									<div class="quiz-qnum">B.</div>
									<div class="quiz-qanswer"><?=$r['answers']['b']?></div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="row quiz-qrow2">
							<div class="col-md-6">
								<div class="quiz-question <?=$r['classes']['c']?>">
									<div class="quiz-qnum">C.</div>
									<div class="quiz-qanswer"><?=$r['answers']['c']?></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="quiz-question <?=$r['classes']['d']?>">
									<div class="quiz-qnum">D.</div>
									<div class="quiz-qanswer"><?=$r['answers']['d']?></div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div> <!-- /container -->
</section>
<!--Quiz Section End-->
