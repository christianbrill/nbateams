<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
	<div class="container">
		<header>
			<h1>W :: <?= $this->e($title) ?></h1>

			<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">

			            <li<?php if($currentPage == 'home'): ?> class="active" <?php endif; ?>><a href="<?= $this->url('default_home') ?>">Home</a></li>
			            <li<?php if($currentPage == 'contact'): ?> class="active" <?php endif; ?>><a href="<?= $this->url('default_contact') ?>">Contact</a></li>
			            <li<?php if($currentPage == 'est'): ?> class="active" <?php endif; ?>><a href="<?= $this->url('conference_est') ?>">Conference Est</a></li>
			            <li<?php if($currentPage == 'ouest'): ?> class="active" <?php endif; ?>><a href="<?= $this->url('conference_ouest') ?>">Conference Ouest</a></li>
			            <li<?php if($currentPage == 'signup'): ?> class="active" <?php endif; ?>><a href="<?= $this->url('user_signup') ?>">Sign Up</a></li>

						<?php if (empty($w_user)) : ?>
			            	<li<?php if($currentPage == 'signin'): ?> class="active" <?php endif; ?>><a href="<?= $this->url('user_signin') ?>">Log In</a></li>
						<?php else : ?>
			            	<li<?php if($currentPage == 'signup'): ?> class="active" <?php endif; ?>><a href="<?= $this->url('user_logout') ?>">Log Out</a></li>
						<?php endif; ?>

			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		</header>

		<?php if (!empty($w_user)) : ?>
			<!-- shows the error messages when password or email are incorrect -->
			<?php if (isset($w_flash_message) && !empty($w_flash_message->message)) : ?>
				<div class="alert alert-<?= $w_flash_message->level ?>" role="alert">
					<?= $w_flash_message->message ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		
		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
