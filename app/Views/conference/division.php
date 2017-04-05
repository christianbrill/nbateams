<?php $this->layout('layoutBootstrap', ['title' => 'Division', 'currentPage' => 'division']);

 	$this->start('main_content') ?>
	<h2>Conference Ouest</h2>

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
			<?php foreach($divisionTeams as $currentTeam) : ?>
				<tr>
					<td><?= $currentTeam['tea_name'] ?></td>
					<td><?= $currentTeam['tea_ville'] ?></td>
					<td><?= $currentTeam['div_name'] ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
<?php $this->stop('main_content') ?>
