<?php $this->layout('layoutBootstrap', ['title' => 'Accueil', 'currentPage' => 'home']) ?>

<?php $this->start('main_content') ?>
	<h2>Acceuil</h2>

	<!-- The information displayed by debug will only be shown if the user is logged in succesfully. -->
	<?php debug($w_user); ?>
<?php $this->stop('main_content') ?>
