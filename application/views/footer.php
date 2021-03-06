<footer>
	<div class="footcontainer <?=$footer_class?>">
		<div class="container">
			<!-- Example row of columns -->
			<div class="row">
				<div class="col-md-4">
					<h2><img class="header-logo" src="<?=base_url('webdesign/images/logo.png')?>" alt="logo"></h2>
					<p class="text-justify">
						Tento web slúži ako projekt na predmet Webové aplikácie a webový dizajn. Obsahuje API na načítavanie postov z <?=anchor('webdesign/twitter/tag/twitter', 'twitteru')?> a <?=anchor('webdesign/twitter/tag/javascript', 'AJAX')?>ový kvíz s vyhodnotením. Vyhodnotenie kvízu je možné exportovať ako CSV, alebo zaslať na e-mail v HTML formáte.
						Web je vytvorený za pomoci frameworkov <?=anchor('webdesign/twitter/tag/bootstrap', 'bootstrap')?> a <?=anchor('webdesign/twitter/tag/codeigniter', 'CodeIgniter')?>.
					</p>
				</div>
				<div class="col-md-4">
					<h2>KDE NÁS NÁJDETE</h2>
					<ul class="list-unstyled list-footer-black">
						<li><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;<a href="#">2963 Charmaine Lane, Amarillo</a></li>
						<li><i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;&nbsp;<a href="#">806-517-7760</a></li>
						<li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;&nbsp;mail@mail.com</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<h2>SLEDUJTE NÁS</h2>
					<p class="follow-us">
						<a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
					</p>
				</div>
			</div>

			<hr />

			<p>&copy; 2017 Tom &amp; Tom</p>

		</div> <!-- /container -->
	</div>
</footer>
<?=$template['js_src_footer'];?>
<?=$template['js_footer'];?>
</body>
</html>
