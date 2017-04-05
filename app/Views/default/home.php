<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<h2>Acceuil</h2>
	<p>TODO</p>
	<a href="<?= $this->url('default_contact') ?>">Contact</a><br>
	<a href="<?= $this->url('conference_est') ?>">Conference Est</a><br>
	<a href="<?= $this->url('conference_ouest') ?>">Conference Ouest</a>
<?php $this->stop('main_content') ?>
