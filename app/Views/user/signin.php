<?php $this->layout('layoutBootstrap', ['title' => 'Signin', 'currentPage' => 'signin']) ?>

<?php $this->start('main_content') ?>
	<h2>Contact us</h2>
    <p>We are awesome.</p>

    <form action="" method="post">
		<fieldset>
			<input type="email" class="form-control" name="emailToto" value="" placeholder="Email address" /><br />
			<input type="password" class="form-control" name="passwordToto1" value="" placeholder="Your password" /><br />
			<input type="submit" class="btn btn-success btn-block" value="Sign in" />
		</fieldset>
	</form>
<?php $this->stop('main_content') ?>
