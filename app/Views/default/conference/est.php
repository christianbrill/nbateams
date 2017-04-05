<?php $this->layout('layoutBootstrap', ['title' => 'Conference Est', 'currentPage' => 'est']) ?>

<?php $this->start('main_content') ?>
	<h2>Conference Est</h2>
	<p>Hello there. This is Conference Est.</p>
	<p>Name of the conférence in the database: <?= $conferenceName ?></p>

	<h3>List of teams</h3>
	<table class='table'>
		<thead>
			<tr>
				<td>Team</td>
				<td>City</td>
				<td>Division</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($allTeams as $currentTeam) : ?>
				<tr>
					<td><?= $currentTeam['tea_name'] ?></td>
					<td><?= $currentTeam['tea_ville'] ?></td>
					<td><a href="<?= $this->url('division_division') ?>"><?= $currentTeam['div_name'] ?></a></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
<?php $this->stop('main_content') ?>
