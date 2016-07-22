<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<?php if(isset($_SESSION['message'])) { ?>
		<div><?= $_SESSION['message'] ?></div>
	<?php } 
		unset($_SESSION['message']);
	?>

<div id="home">
	<h1><span>MovieCount</span>, Votre profil cinema en ligne.</h1>
	<p>Créer votre compte <span>Movicount</span> en ligne pour découvrir votre profil cinema a travers les films que vous avez vu. </p>
</div>

<section id="newFilm">
	<h2>Top 5</h2>
	<?php foreach ($top5 as $film): ?>
		<article>
			<a href="<?= $this->url('detail', ['id' => $film['id_film']]) ?>">
				<img class="" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2<?= $film['img'] ?>"  alt="">
				<h3><?= mb_strimwidth($film['titre'], 0, 23, "...") ?></h3>
			</a>
			<?php if(isset($_SESSION['user'])) { ?>
				<div id="btn">
					<a href="<?= $this->url('dejavu', ['id_user' => $_SESSION['user']['id'], 'id_film' => $film['id_film']])?>" title="j'ai déjà vu !"><i class="fa fa-eye" aria-hidden="true"></i></a>
					<a href="<?= $this->url('jveuxvoir', ['id_user' => $_SESSION['user']['id'], 'id_film' => $film['id_film']])?>" title="j'veux voir !"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
				</div>
			<?php } else { ?>
				<div id="btn">
					<a><i class="fa fa-eye" aria-hidden="true"></i></a>
					<a><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
				</div>
			<?php } ?>

		</article>
	<?php endforeach ?>
</section>

<div id="SorAct">
	<!-- section avec video -->
	<section id="lastRealease">
		<h2>Dernieres sorties</h2>
		<a href="">
			<h3>Batman Vs Superman - Dawn Of Justice <span>2016</span></h3>
		</a>

		<div class="video-container">
			<iframe src="//www.youtube.com/embed/1iK44Bjajh4?rel=0" frameborder="0" allowfullscreen></iframe>
		</div>

		<article id="SidVid">
			<h4>Realisateur</h4>
			<p>Zack Znyder</p>

			<h4>Acteurs</h4>
			<p>-Henry Cavil</p>
			<p>-Gal Gadot</p>
			<p>-Ben Afleck</p>

			<h4>Synopsis</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</p>
				<?php if(isset($_SESSION['user'])) { ?>
					<div id="btn">
						<a href="#" title="j'ai déjà vu !"><i class="fa fa-eye" aria-hidden="true"></i></a>
						<a href="#" title="j'veux voir !"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
					</div>
				<?php } else { ?>
					<div id="btn">
						<a><i class="fa fa-eye" aria-hidden="true"></i></a>
						<a><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
					</div>
				<?php } ?>
			</article>
		</section>

		<!-- 2eme section de la div -->
		<section id="activity">
			<h2>Activités de la communauté</h2>
			<?php //var_dump($lastActivity) ?>
			<ul>
				<?php foreach ($lastActivity as $valeur): ?>
					<?php 
					if ($valeur['stat_view'] == 1){
						$view = ' a vu ';
					} else {
						$view = ' veut voir ';
					}
					?>
					<li><p><?= $valeur['username'] ?><span><?= $view ?></span><a href="<?= $this->url('detail', ['id' => $valeur['id']]) ?>"><?= mb_strimwidth($valeur['titre'], 0, 20, "...") ?> </a><span>le  <?= strftime('%d/%m', strtotime($valeur['date_ajout'])) ?></span></p></li>
				<!-- <li><p>Haji <span>a suivi .......</span> Yanis</p></li>
				<li><p>Marcus <span>a vu .......</span> 1200 films</p></li>
				<li><p>Maxime <span>a suivi ......</span>Yanis</p></li>
				<li><p>Jeremi <span>a suivi ......</span>Simon</p></li>
				<li><p>Yanis <span>a vus .......</span>150 films</p></li>
				<li><p>Simon <span>a vus .......</span>300 films</p></li> -->
				<?php endforeach ?>
			</ul>
		</section>

</div>


<!-- section top 5 ajout a la liste vu -->
<section id="newFilm2">
	<h2>top 5 ajout a la liste vu</h2>
	<?php foreach ($top5Vu as $film): ?>
		<article>
			<a href="<?= $this->url('detail', ['id' => $film['id_film']]) ?>">
				<img class="" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2<?= $film['img'] ?>"  alt="">
				<h3><?= mb_strimwidth($film['titre'], 0, 23, "...") ?></h3>
			</a>
			<?php if(isset($_SESSION['user'])) { ?>
				<div id="btn">
					<a href="<?= $this->url('dejavu', ['id_user' => $_SESSION['user']['id'], 'id_film' => $film['id_film']])?>" title="j'ai déjà vu""><i class="fa fa-eye" aria-hidden="true"></i></a>
					<a href="<?= $this->url('jveuxvoir', ['id_user' => $_SESSION['user']['id'], 'id_film' => $film['id_film']])?>" title="j'veux voir !"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
				</div>
			<?php } else { ?>
				<div id="btn">
					<a><i class="fa fa-eye" aria-hidden="true"></i></a>
					<a><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
				</div>
			<?php } ?>
		</article>
	<?php endforeach ?>
</section>

<div id="TopDisc">
	<!-- section le top de la communauté -->
	<section id="TopCom">
		<h2>le top de la communauté</h2>
		<ul>
			<?php foreach ($topUsers as $indice => $valeur): ?>
				<li><p><?= $topUsers[$indice]['username'] ?><span> a vu ......... </span><?= $topUsers[$indice]['topUser']?> films</p>
				<!-- <li><p>haji <span>a vu .......</span>5300 films</p></li>
				<li><p>marcus <span>a vu .......</span>1200 films</p></li>
				<li><p>maxime <span>a vu .......</span>500 films</p></li>
				<li><p>jeremi <span>a vu .......</span>400 films</p></li>
				<li><p>yanis <span>a vu .......</span>150 films</p></li>
				<li><p>yanis <span>a vu .......</span>150 films</p></li>
				<li><p>maxime <span>a vu .......</span>500 films</p></li>
				<li><p>jeremi <span>a vu .......</span>400 films</p></li> -->
			<?php endforeach ?>
		</ul>
		
	</section>

	<!-- section decouvrir -->
	<section id="Disco">
		<h2><a href="<?= $this->url('decouvrir')?>" id="decouvrir">decouvrir</a></h2>
		<?php //var_dump($trois_films) ?>
		<?php foreach ($trois_films as $film): ?>
			<article>
				<a href="<?= $this->url('detail', ['id' => $film['id']]) ?>">
					<img class="" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2<?= $film['img'] ?>"  alt="">
					<h3><?= mb_strimwidth($film['titre'], 0, 23, "...") ?></h3>
				</a>
				<?php if(isset($_SESSION['user'])) { ?>
					<div id="btn">
						<a href="<?= $this->url('dejavu', ['id_user' => $_SESSION['user']['id'], 'id_film' => $film['id']])?>" title="j'ai déjà vu !""><i class="fa fa-eye" aria-hidden="true"></i></a>
						<a href="<?= $this->url('jveuxvoir', ['id_user' => $_SESSION['user']['id'], 'id_film' => $film['id']])?>" title="j'veux voir !"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
					</div>
				<?php } else { ?>
					<div id="btn">
						<a><i class="fa fa-eye" aria-hidden="true"></i></a>
						<a><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
					</div>
				<?php } ?>
			</article>
		<?php endforeach ?>
	</section>
</div>


<?php $this->stop('main_content') ?>
