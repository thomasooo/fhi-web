<!--Quiz Section-->
<section class="content-section">
	<div class="grey-bg bottom-grey-border">
		<div class="container">
			<!-- row of columns -->
			<div class="row">
				<div class="col-md-12">
					<h2>twitter #<?=$tag?></h2>
				</div>
			</div>
		</div> <!-- /container -->
	</div>
	<div class="container">
		<?php foreach($feed as $f): ?>
			<!-- row of columns -->
			<div class="row tw-row">
				<div class="row">
					<div class="col-md-1 tw-profile-imgs tw-height" style="background: url('<?=$f['user_profile_background_image']?>')">
						<img src="<?=$f['user_profile_image']?>" alt="author image" class="img-thumbnail" />
					</div>
					<div class="col-md-7 tw-height">
						<h3><?=anchor('https://twitter.com/'.$f['urlname'], $f['username'], 'target="_blank"')?></h3>
						<p class="tw-tweet"><?=$f['tweet']?> <?=anchor('https://twitter.com/'.$f['urlname'].'/status/'.$f['tweet_id'], 'viac...', ' target="_blank"')?></p>
					</div>
					<div class="col-md-4 tw-media tw-height tw-rimage">
						<?php if($f['media']): ?><img src="<?=$f['media']?>" alt="author image" class="tw-height" /><?php endif; ?>
					</div>
				</div>
				<div class="row tw-foot">
					<div class="col-md-12">
						<div class="pull-left">
							<?=format_time($f['created_at'])?>
						</div>
						<div class="pull-right">
							<?=$f['username']?> má <?=$f['followers_count']?> sledovateľov a <?=$f['friends_count']?> priateľov.
						</div>
					</div>
				</div>
				</div>
			<?php endforeach; ?>
		</div> <!-- /container -->
	</section>
	<!--Quiz Section End-->
