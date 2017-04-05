<?php $this->layout('layoutBootstrap', ['title' => 'Division', 'currentPage' => 'division']);

 	$this->start('main_content') ?>
	<h2>Conference Ouest</h2>

	<h3>List of teams</h3>
	<table class='table'>
		<thead>
			<tr>
				<td>Team</td>
				<td>City</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($divisionTeams as $currentTeam) : ?>
				<tr>
					<td><?= $currentTeam['tea_name'] ?></td>
					<td><?= $currentTeam['tea_ville'] ?></td>
					<td><a href="<?= $this->url('division_division', array('id' => $currentTeam['div_id'], 'divName' => $currentTeam['div_name'])); ?>"><?= $currentTeam['tea_ville'] ?></a></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
<?php $this->stop('main_content') ?>
