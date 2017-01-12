<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<?=$template['other_header'];?>
	<?=$template['meta'];?>
	<?=$template['links'];?>
	<?=$template['js_src'];?>
	<?=$template['js'];?>
	<title><?=$template['title']?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<!-- Static navbar -->
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?=base_url()?>"><img class="header-logo" src="<?=base_url('webdesign/images/logo.png')?>" alt="logo"></a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="<?=base_url()?>">Home <span class="sr-only">(current)</span></a></li>
						<li><a href="#">First</a></li>
						<li><a href="#">Second</a></li>
						<li class="ml-bigger">
							<div class="btn-nav">
								<a class="btn btn-red btn-small navbar-btn" href="<?=site_url('webdesign/home/quiz')?>">QUIZ</a>
							</div>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		</nav>
	</div> <!-- /container -->
