<?php $this->layout('layoutBootstrap', ['title' => 'Conference Ouest', 'currentPage' => 'ouest']) ?>

<?php $this->start('main_content') ?>
	<h2>Conference Ouest</h2>
	<p>Hello there. This is Conference Ouest.</p>
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
					<td><?= $currentTeam['div_name'] ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
<?php $this->stop('main_content') ?>
