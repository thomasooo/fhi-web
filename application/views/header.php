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
	<link rel="shortcut icon" href="<?=base_url('favicon.ico')?>" type="image/x-icon">
	<link rel="icon" href="<?=base_url('favicon.ico')?>" type="image/x-icon">
</head>
<body>
	<div class="loader"><div class="txt text-center"><i class="fa fa-spinner fa-spin"></i> </div></div>
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
						<?php foreach($navigation as $nav): ?>
							<li<?php if($nav['active']): ?> class="active"<?php endif; ?>><a href="<?=site_url($nav['site_url'])?>"><?=$nav['label']?><?php if($nav['active']): ?> <span class="sr-only">(current)</span><?php endif; ?></a></li>
						<?php endforeach; ?>
						<li class="ml-bigger">
							<div class="btn-nav">
								<a class="btn btn-red btn-small navbar-btn" href="<?=site_url('webdesign/home/quiz')?>">KVÍZ</a>
							</div>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		</nav>
	</div> <!-- /container -->
