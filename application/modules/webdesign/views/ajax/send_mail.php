<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">

	body{
		font-family: "Oswald", Helvetica, Arial, sans-serif;
		width: 100%;
		margin: 0;
		padding: 0;
		color: #5C5C5C;
		background-color: rgb(241, 241, 241);
	}

	.container{
		margin: 1em auto;
		max-width: 900px;
		padding: 0;
		border: 1px solid white;
		background-color: white;
		box-shadow: 0px 0px 8px rgba(0,0,0,0.4);
		border-radius: 3px;
	}

	.quiz{
		margin: 2em;
	}

	.quiz-header{
		font-weight: bold;
	}

	.quiz-qnum{
		padding: .5em;
		margin: .25em;
		width: 2.5em;
		background-color: #EC3713;
		text-align: center;
		color: white;
		font-weight: bold;
		font-size: 1.5em;
		border-radius: 5px;
		display: inline-block;
		float:left;
		box-shadow: 0px 0px 2px rgba(0,0,0,0.4);
	}

	.quiz-qanswer{
		max-width: 60%;
		text-align: left;
		padding: .5em 0;
		margin-left: 5px;
		display: inline-block;
		float:left;
	}

	.quiz-question{
		border-radius: 5px;
		display: inline-block;
		width: 100%;
		margin-bottom: .2em;
	}

	.quiz-ans-selected{
		box-shadow: 0px 0px 8px rgba(203, 0, 0, 0.6);
	}

	.quiz-ans-correct{
		box-shadow: 0px 0px 8px rgba(13, 171, 0, 0.8);
	}

	</style>
</head>
<body>
	<div class="container">
		<div class="quiz">
			<h1>Správne: <?=$result['counts']['correct']?> z <?=$result['counts']['total']?></h1>
			<?php foreach($result['results'] as $k => $r): ?>
				<h3 class="quiz-res-header"><?=$k?>. <?=$r['question']?></h3>
				<div class="quiz-question <?=$r['classes']['a']?>">
					<div class="quiz-qnum">A.</div>
					<div class="quiz-qanswer"><?=$r['answers']['a']?></div>
					<div class="clearfix"></div>
				</div>
				<div class="quiz-question <?=$r['classes']['b']?>">
					<div class="quiz-qnum">B.</div>
					<div class="quiz-qanswer"><?=$r['answers']['b']?></div>
					<div class="clearfix"></div>
				</div>
				<div class="quiz-question <?=$r['classes']['c']?>">
					<div class="quiz-qnum">C.</div>
					<div class="quiz-qanswer"><?=$r['answers']['c']?></div>
					<div class="clearfix"></div>
				</div>
				<div class="quiz-question <?=$r['classes']['d']?>">
					<div class="quiz-qnum">D.</div>
					<div class="quiz-qanswer"><?=$r['answers']['d']?></div>
					<div class="clearfix"></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</body>
</html>
