<?php

namespace Controller;

use \W\Controller\Controller;

class DivisionController extends Controller {

	public function division($id, $divName) {

		$teamModel = new \Model\TeamModel();
		$allTeams = $teamModel->findAll();
		debug($allTeams);

		$divisionTeams = array();
		//I initialize my array
		foreach($allTeams as $currentTeam) {
			if($currentTeam['div_id'] == $id) {
				$divisionTeams[] = $currentTeam;
			}
		}
		exit;

	}
}
